<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerAccountController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $orders = $request->user()
            ->orders()
            ->latest()
            ->paginate(10)
            ->through(fn (Order $order): array => $this->orderSummary($order));

        return response()->json(['orders' => $orders]);
    }

    public function showOrder(Request $request, int $order): JsonResponse
    {
        $customerOrder = $request->user()
            ->orders()
            ->with('items.product.images')
            ->whereKey($order)
            ->firstOrFail();

        return response()->json([
            'order' => $this->orderSummary($customerOrder) + [
                'shipping_name' => $customerOrder->shipping_name,
                'shipping_phone' => $customerOrder->shipping_phone,
                'shipping_address' => $customerOrder->shipping_address,
                'payment_method' => $customerOrder->payment_method,
                'payment_status' => $customerOrder->payment_status,
                'shipping_cost' => $customerOrder->shipping_cost,
                'discount' => $customerOrder->discount,
                'items' => $customerOrder->items->map(fn ($item): array => [
                    'id' => $item->id,
                    'product_name' => $item->product_name,
                    'image_url' => $item->product?->image_url ?? asset('assets/images/products/1.png'),
                    'quantity' => $item->quantity,
                    'unit_price' => $item->unit_price,
                    'subtotal' => $item->subtotal,
                ]),
            ],
        ]);
    }

    public function updateProfile(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:2000'],
        ]);

        $request->user()->update($data);

        return response()->json([
            'message' => 'Your account details have been updated.',
            'user' => [
                'id' => $request->user()->id,
                'name' => $request->user()->name,
                'email' => $request->user()->email,
                'role' => $request->user()->role,
                'phone' => $request->user()->phone,
                'address' => $request->user()->address,
            ],
        ]);
    }

    /**
     * @return array{id: int, order_number: string, total: string, status: string, payment_status: string, created_at: string}
     */
    private function orderSummary(Order $order): array
    {
        return [
            'id' => $order->id,
            'order_number' => $order->order_number,
            'total' => $order->total,
            'status' => $order->status,
            'payment_status' => $order->payment_status,
            'created_at' => $order->created_at->toISOString(),
        ];
    }
}
