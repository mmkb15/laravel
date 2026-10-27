<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with(['user', 'items.product'])
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->when($request->filled('search'), function ($q) use ($request) {
                $term = $request->string('search');
                $q->where(function ($query) use ($term) {
                    $query->where('order_number', 'like', "%{$term}%")
                        ->orWhere('shipping_name', 'like', "%{$term}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.pages.order.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.pages.order.create', [
            'customers' => User::where('role', 'customer')->orderBy('name')->get(),
            'products' => Product::where('status', 'active')->where('stock', '>', 0)->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|in:cod,bank',
            'shipping_name' => 'required|string|max:255',
            'shipping_phone' => 'required|string|max:50',
            'shipping_address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $product = Product::findOrFail($data['product_id']);
        if ($data['quantity'] > $product->stock) {
            return back()->withErrors(['quantity' => 'Not enough stock available.'])->withInput();
        }

        $unit = (float) ($product->sale_price ?: $product->price);
        $subtotal = $unit * $data['quantity'];
        $shipping = 0;
        $total = $subtotal;

        DB::transaction(function () use ($data, $product, $unit, $subtotal, $shipping, $total) {
            $order = Order::create([
                'order_number' => 'ORD-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(4)),
                'user_id' => $data['user_id'] ?? null,
                'subtotal' => $subtotal,
                'shipping_cost' => $shipping,
                'discount' => 0,
                'total' => $total,
                'payment_method' => $data['payment_method'],
                'payment_status' => 'pending',
                'status' => 'pending',
                'shipping_name' => $data['shipping_name'],
                'shipping_phone' => $data['shipping_phone'],
                'shipping_address' => $data['shipping_address'],
                'notes' => $data['notes'] ?? null,
            ]);

            $order->items()->create([
                'product_id' => $product->id,
                'product_name' => $product->name,
                'quantity' => $data['quantity'],
                'unit_price' => $unit,
                'subtotal' => $subtotal,
            ]);

            $product->decrement('stock', $data['quantity']);
        });

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        $order->load(['user', 'items.product.images']);
        return view('admin.pages.order.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order->update(['status' => $data['status']]);

        if ($data['status'] === 'delivered') {
            $order->update([
                'payment_status' => $order->payment_method === 'cod' ? 'paid' : $order->payment_status,
            ]);
        }

        return back()->with('success', 'Order status updated.');
    }
}
