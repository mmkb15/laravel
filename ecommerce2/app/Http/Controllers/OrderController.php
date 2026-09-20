<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest('order_date')->paginate(15);
        return view('admin.pages.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items.sku.product');
        return view('admin.pages.order.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => ['required','in:Pending,Processing,Shipped,Delivered,Cancelled'],
        ]);

        $order->update(['status' => $data['status']]);
        return back()->with('success', 'Order status updated.');
    }
}
