<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Order list
    public function index(Request $request)
    {
        $orders = Order::with('user')
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when($request->search, function ($query) use ($request) {
                $query->where('id', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    // Order details দেখা
    public function show(Order $order)
    {
        $order->load('user', 'coupon', 'items.sku.product', 'payment', 'shipment');
        return view('admin.orders.show', compact('order'));
    }

    // Status update form
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    // Status update process
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Order status updated successfully!');
    }
}
