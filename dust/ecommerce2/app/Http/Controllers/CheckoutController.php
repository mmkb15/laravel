<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductSku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function create()
    {
        $cart = session('cart', []);
        abort_if(empty($cart), 404);

        return view('shop.checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => ['required','string','max:100'],
            'phone' => ['required','string','max:20'],
            'email' => ['nullable','email','max:150'],
            'address' => ['required','string','max:500'],
        ]);

        $cart = session('cart', []);
        if (!$cart) return redirect()->route('shop.index')->with('error', 'Your cart is empty.');

        $order = DB::transaction(function () use ($cart, $data) {
            $subtotal = 0;
            $checked = [];

            foreach ($cart as $item) {
                $sku = ProductSku::whereKey($item['sku_id'])->lockForUpdate()->firstOrFail();

                if ($sku->stock_quantity < $item['quantity']) {
                    abort(422, "Insufficient stock for {$sku->product->name}.");
                }

                $subtotal += $sku->price * $item['quantity'];
                $checked[] = [$sku, $item['quantity']];
            }

            $order = Order::create([
                'order_number' => 'MUR-'.now()->format('YmdHis').'-'.Str::upper(Str::random(4)),
                'customer_name' => $data['customer_name'],
                'phone' => $data['phone'],
                'email' => $data['email'] ?? null,
                'shipping_address' => $data['address'],
                'subtotal' => $subtotal,
                'discount_amount' => 0,
                'shipping_cost' => 0,
                'tax_amount' => 0,
                'total_amount' => $subtotal,
                'status' => 'Pending',
                'order_date' => now(),
            ]);

            foreach ($checked as [$sku, $quantity]) {
                OrderItem::create([
                    'order_id' => $order->order_id,
                    'sku_id' => $sku->sku_id,
                    'quantity' => $quantity,
                    'price' => $sku->price,
                ]);

                $sku->decrement('stock_quantity', $quantity);
            }

            return $order;
        });

        session()->forget('cart');

        return redirect()->route('shop.order.success', $order)->with('success', 'Order placed successfully.');
    }

    public function success(Order $order)
    {
        $order->load('items.sku.product');
        return view('shop.success', compact('order'));
    }
}
