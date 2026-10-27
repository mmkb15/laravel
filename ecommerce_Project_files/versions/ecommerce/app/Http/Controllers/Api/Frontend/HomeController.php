<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    // Build a public URL for a file stored on the "public" disk
    private function fileUrl(?string $path): string
    {
        return $path ? asset('storage/' . $path) : '';
    }

    // GET /api/products
    public function products()
    {
        $categories = DB::table('categories')->pluck('name', 'id');
        $brands = DB::table('brands')->pluck('name', 'id');

        return DB::table('products')
            ->where('status', 'active')
            ->orderByDesc('id')
            ->get()
            ->map(fn ($p) => [
                'id'            => $p->id,
                'name'          => $p->name,
                'description'   => $p->description,
                'image'         => $this->fileUrl($p->image),
                // Use the sale price when it exists, otherwise the regular price
                'price'         => (float) ($p->sale_price ?? $p->price),
                'regular_price' => (float) $p->price,
                'brand'         => $brands[$p->brand_id] ?? '',
                'category_name' => $categories[$p->category_id] ?? '',
                'sku'           => $p->sku,
                'stock'         => (int) $p->stock,
                // The React filter expects a comma separated string
                'category_ids'  => (string) $p->category_id,
            ])
            ->values();
    }

    // GET /api/categories
    public function categories()
    {
        return DB::table('categories')
            ->where('status', 'active')
            ->orderBy('id')
            ->get()
            ->map(fn ($c) => [
                'id'             => $c->id,
                'name'           => $c->name,
                'slug'           => $c->slug,
                'image_icon_url' => $this->fileUrl($c->image),
            ])
            ->values();
    }

    // POST /api/orders
    public function storeOrder(Request $request)
    {
        $data = $request->validate([
            'items'              => 'required|array|min:1',
            'items.*.id'         => 'required|integer',
            'items.*.quantity'   => 'required|integer|min:1',
            'shipping_name'      => 'required|string|max:255',
            'shipping_phone'     => 'required|string|max:255',
            'shipping_address'   => 'required|string',
            'email'              => 'nullable|email',
        ]);

        $order = DB::transaction(function () use ($data) {
            $ids = collect($data['items'])->pluck('id');

            // Lock the rows so two customers cannot buy the last item at once
            $products = DB::table('products')
                ->whereIn('id', $ids)
                ->where('status', 'active')
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            $subtotal = 0;
            $lines = [];

            foreach ($data['items'] as $item) {
                $product = $products->get($item['id']);

                if (!$product || $product->stock < $item['quantity']) {
                    abort(422, 'Product unavailable or out of stock: ' . ($product->name ?? $item['id']));
                }

                // Never trust the price sent by the browser
                $unitPrice = (float) ($product->sale_price ?? $product->price);
                $lineTotal = $unitPrice * $item['quantity'];
                $subtotal += $lineTotal;

                $lines[] = [
                    'product_id'   => $product->id,
                    'product_name' => $product->name,
                    'quantity'     => $item['quantity'],
                    'unit_price'   => $unitPrice,
                    'subtotal'     => $lineTotal,
                ];
            }

            $now = now();

            $orderId = DB::table('orders')->insertGetId([
                'order_number'     => 'ORD-' . $now->format('YmdHis') . '-' . Str::upper(Str::random(4)),
                'user_id'          => null, // guest checkout
                'subtotal'         => $subtotal,
                'shipping_cost'    => 0,
                'discount'         => 0,
                'total'            => $subtotal,
                'payment_method'   => 'cod',
                'payment_status'   => 'pending',
                'status'           => 'pending',
                'shipping_name'    => $data['shipping_name'],
                'shipping_phone'   => $data['shipping_phone'],
                'shipping_address' => $data['shipping_address'],
                'notes'            => !empty($data['email']) ? 'Customer email: ' . $data['email'] : null,
                'created_at'       => $now,
                'updated_at'       => $now,
            ]);

            foreach ($lines as $line) {
                DB::table('order_items')->insert($line + [
                    'order_id'   => $orderId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);

                DB::table('products')
                    ->where('id', $line['product_id'])
                    ->decrement('stock', $line['quantity']);
            }

            return DB::table('orders')->find($orderId);
        });

        return response()->json(['message' => 'ok', 'order_number' => $order->order_number], 200);
    }
}