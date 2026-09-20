<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.pages.dashboard', [
            'productCount' => Product::count(),
            'categoryCount' => Category::count(),
            'orderCount' => Order::count(),
            'salesTotal' => Order::whereIn('status', ['Processing','Shipped','Delivered'])->sum('total_amount'),
            'recentOrders' => Order::latest('order_date')->take(5)->get(),
        ]);
    }
}
