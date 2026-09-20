<?php
namespace App\Http\Controllers; use App\Models\Order;
class CustomerOrderController extends Controller {public function index(){return view('store.orders',['orders'=>auth()->user()->orders()->latest('order_date')->paginate(15)]);}public function show(Order $order){abort_unless($order->user_id===auth()->id(),403);$order->load(['items.sku.product','payment','shipment']);return view('store.order-show',compact('order'));}}
