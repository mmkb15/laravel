<?php

namespace App\Http\Controllers;

use App\Models\ProductSku;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        return view('shop.cart', compact('cart'));
    }

    public function add(Request $request, ProductSku $sku)
    {
        $quantity = max(1, (int) $request->input('quantity', 1));

        if ($quantity > $sku->stock_quantity) {
            return back()->with('error', 'Requested quantity is not available.');
        }

        $cart = session('cart', []);
        $key = (string) $sku->sku_id;

        $cart[$key] = [
            'sku_id' => $sku->sku_id,
            'product_id' => $sku->product_id,
            'name' => $sku->product->name,
            'sku_code' => $sku->sku_code,
            'price' => (float) $sku->price,
            'quantity' => min($quantity + ($cart[$key]['quantity'] ?? 0), $sku->stock_quantity),
            'image_url' => $sku->image_url,
        ];

        session(['cart' => $cart]);
        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function update(Request $request)
    {
        $cart = session('cart', []);

        foreach ($request->input('quantity', []) as $key => $qty) {
            if (!isset($cart[$key])) continue;

            $sku = ProductSku::find($key);
            if (!$sku) {
                unset($cart[$key]);
                continue;
            }

            $qty = max(1, (int) $qty);
            $cart[$key]['quantity'] = min($qty, $sku->stock_quantity);
        }

        session(['cart' => $cart]);
        return back()->with('success', 'Cart updated.');
    }

    public function remove(string $skuId)
    {
        $cart = session('cart', []);
        unset($cart[$skuId]);
        session(['cart' => $cart]);

        return back()->with('success', 'Item removed from cart.');
    }
}
