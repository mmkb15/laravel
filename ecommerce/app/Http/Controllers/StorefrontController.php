<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Collection;

class StorefrontController extends Controller
{
    public function home(): View
    {
        $products = Product::query()
            ->select(['id', 'name', 'slug', 'image', 'category_id', 'price', 'sale_price', 'stock', 'created_at'])
            ->with(['category:id,name,slug', 'primaryImage'])
            ->where('status', 'active')
            ->latest()
            ->limit(30)
            ->get();

        $categories = Category::query()
            ->where('status', 'active')
            ->whereHas('products', fn (Builder $query) => $query->where('status', 'active'))
            ->withCount(['products' => fn (Builder $query) => $query->where('status', 'active')])
            ->orderByDesc('products_count')
            ->limit(5)
            ->get();

        return view('frontend.pages.home', [
            'trendingProducts' => $products,
            'justForYouProducts' => $products->skip(5)->take(4),
            'categories' => $categories,
        ]);
    }

    public function shop(Request $request): View
    {
        $filters = $request->validate([
            'search' => 'nullable|string|max:100',
            'categories' => 'sometimes|array',
            'categories.*' => 'string|exists:categories,slug',
            'brands' => 'sometimes|array',
            'brands.*' => 'string|exists:brands,slug',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0|gte:min_price',
            'in_stock' => 'sometimes|boolean',
            'on_sale' => 'sometimes|boolean',
            'sort' => 'nullable|in:newest,price_low,price_high',
        ]);

        $products = Product::query()
            ->with(['category', 'brand', 'primaryImage'])
            ->where('status', 'active')
            ->when(! empty($filters['search']), function (Builder $query) use ($filters) {
                $query->where('name', 'like', '%' . $filters['search'] . '%');
            })
            ->when(! empty($filters['categories']), function (Builder $query) use ($filters) {
                $query->whereHas('category', fn (Builder $categoryQuery) => $categoryQuery->whereIn('slug', $filters['categories']));
            })
            ->when(! empty($filters['brands']), function (Builder $query) use ($filters) {
                $query->whereHas('brand', fn (Builder $brandQuery) => $brandQuery->whereIn('slug', $filters['brands']));
            })
            ->when(! empty($filters['min_price']), fn (Builder $query) => $query->whereRaw('COALESCE(NULLIF(sale_price, 0), price) >= ?', [$filters['min_price']]))
            ->when(! empty($filters['max_price']), fn (Builder $query) => $query->whereRaw('COALESCE(NULLIF(sale_price, 0), price) <= ?', [$filters['max_price']]))
            ->when(($filters['in_stock'] ?? false) === true || ($filters['in_stock'] ?? null) === '1', fn (Builder $query) => $query->where('stock', '>', 0))
            ->when(($filters['on_sale'] ?? false) === true || ($filters['on_sale'] ?? null) === '1', fn (Builder $query) => $query->whereNotNull('sale_price'))
            ->when(($filters['sort'] ?? 'newest') === 'price_low', fn (Builder $query) => $query->orderByRaw('COALESCE(NULLIF(sale_price, 0), price) asc'))
            ->when(($filters['sort'] ?? 'newest') === 'price_high', fn (Builder $query) => $query->orderByRaw('COALESCE(NULLIF(sale_price, 0), price) desc'))
            ->when(! in_array($filters['sort'] ?? 'newest', ['price_low', 'price_high'], true), fn (Builder $query) => $query->latest())
            ->paginate(12)
            ->withQueryString();

        return view('frontend.pages.shop-catalog', [
            'products' => $products,
            'categories' => Category::query()->where('status', 'active')->withCount([
                'products' => fn (Builder $query) => $query->where('status', 'active'),
            ])->orderBy('name')->get(),
            'brands' => Brand::query()->where('status', 'active')->withCount([
                'products' => fn (Builder $query) => $query->where('status', 'active'),
            ])->orderBy('name')->get(),
            'selectedCategories' => $filters['categories'] ?? [],
            'selectedBrands' => $filters['brands'] ?? [],
        ]);
    }

    public function show(Product $product): View
    {
        abort_unless($product->status === 'active', 404);

        $product->load(['category', 'brand', 'images', 'primaryImage']);
        $relatedProducts = Product::query()
            ->with('primaryImage')
            ->where('status', 'active')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->limit(5)
            ->get();

        return view('frontend.pages.product-detail', compact('product', 'relatedProducts'));
    }

    public function cart(): View
    {
        $cartItems = $this->cartItems();

        return view('frontend.pages.cart-page', [
            'cartItems' => $cartItems,
            'subtotal' => $cartItems->sum('subtotal'),
        ]);
    }

    public function addToCart(Request $request, Product $product): RedirectResponse
    {
        abort_unless($product->status === 'active', 404);

        $data = $request->validate(['quantity' => 'required|integer|min:1']);
        $cart = $request->session()->get('cart', []);
        $newQuantity = ($cart[$product->id] ?? 0) + $data['quantity'];

        if ($newQuantity > $product->stock) {
            throw ValidationException::withMessages([
                'quantity' => "Only {$product->stock} unit(s) of {$product->name} are available.",
            ]);
        }

        $cart[$product->id] = $newQuantity;
        $request->session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Product added to your cart.');
    }

    public function updateCart(Request $request, Product $product): RedirectResponse
    {
        $data = $request->validate([
            'quantity' => 'required|integer|min:1',
            'step' => 'nullable|in:increase,decrease',
        ]);

        $cart = $request->session()->get('cart', []);
        $currentQuantity = (int) ($cart[$product->id] ?? $data['quantity']);
        $quantity = match ($data['step'] ?? null) {
            'increase' => $currentQuantity + 1,
            'decrease' => max(1, $currentQuantity - 1),
            default => $data['quantity'],
        };

        if ($product->status !== 'active' || $quantity > $product->stock) {
            throw ValidationException::withMessages([
                'quantity' => "The requested quantity for {$product->name} is unavailable.",
            ]);
        }

        $cart[$product->id] = $quantity;
        $request->session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Cart updated.');
    }

    public function removeFromCart(Request $request, Product $product): RedirectResponse
    {
        $cart = $request->session()->get('cart', []);
        unset($cart[$product->id]);
        $request->session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Product removed from your cart.');
    }

    public function checkout(): View|RedirectResponse
    {
        $cartItems = $this->cartItems();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Add a product to your cart before checkout.');
        }

        return view('frontend.pages.checkout', [
            'cartItems' => $cartItems,
            'subtotal' => $cartItems->sum('subtotal'),
        ]);
    }

    public function placeOrder(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_phone' => 'required|string|max:50',
            'shipping_address' => 'required|string|max:5000',
            'payment_method' => 'required|in:cod,bank',
            'notes' => 'nullable|string|max:2000',
        ]);
        $cart = $request->session()->get('cart', []);

        if ($cart === []) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $order = DB::transaction(function () use ($cart, $data) {
            $products = Product::query()
                ->whereIn('id', array_keys($cart))
                ->where('status', 'active')
                ->lockForUpdate()
                ->get()
                ->keyBy('id');
            $subtotal = 0;

            foreach ($cart as $productId => $quantity) {
                $product = $products->get((int) $productId);

                if (! $product || $quantity > $product->stock) {
                    throw ValidationException::withMessages([
                        'cart' => 'Your cart has an item that is no longer available in the requested quantity.',
                    ]);
                }

                $unitPrice = (float) ($product->sale_price ?? $product->price);
                $subtotal += $unitPrice * $quantity;
            }

            $order = Order::create([
                'order_number' => 'ORD-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(4)),
                'user_id' => Auth::id(),
                'subtotal' => $subtotal,
                'shipping_cost' => 0,
                'discount' => 0,
                'total' => $subtotal,
                'payment_method' => $data['payment_method'],
                'payment_status' => 'pending',
                'status' => 'pending',
                'shipping_name' => $data['shipping_name'],
                'shipping_phone' => $data['shipping_phone'],
                'shipping_address' => $data['shipping_address'],
                'notes' => $data['notes'] ?? null,
            ]);

            foreach ($cart as $productId => $quantity) {
                $product = $products->get((int) $productId);
                $unitPrice = (float) ($product->sale_price ?? $product->price);
                $lineSubtotal = $unitPrice * $quantity;

                $order->items()->create([
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'subtotal' => $lineSubtotal,
                ]);

                $product->decrement('stock', $quantity);
            }

            return $order;
        });

        $request->session()->forget('cart');

        return redirect()->route('cart')->with('success', "Order {$order->order_number} was placed successfully.");
    }

    private function cartItems(): Collection
    {
        $cart = session()->get('cart', []);

        if ($cart === []) {
            return collect();
        }

        $products = Product::query()
            ->with('primaryImage')
            ->whereIn('id', array_keys($cart))
            ->where('status', 'active')
            ->get()
            ->keyBy('id');

        return collect($cart)
            ->map(function (int $quantity, string|int $productId) use ($products): ?array {
                $product = $products->get((int) $productId);

                if (! $product) {
                    return null;
                }

                return [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => (float) ($product->sale_price ?? $product->price) * $quantity,
                ];
            })
            ->filter()
            ->values();
    }
}
