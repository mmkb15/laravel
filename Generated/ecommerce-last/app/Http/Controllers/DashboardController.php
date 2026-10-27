<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard', [
            'productCount' => Product::count(),
            'categoryCount' => Category::count(),
            'brandCount' => Brand::count(),
            'customerCount' => User::where('role', 'customer')->count(),
            'orderCount' => Order::count(),
            'salesTotal' => Order::whereIn('status', ['processing', 'shipped', 'delivered'])->sum('total'),
            'recentOrders' => Order::with(['user', 'items.product'])->latest()->take(6)->get(),
            'lowStockProducts' => Product::where('stock', '<=', 5)->with('images')->orderBy('stock')->take(6)->get(),
        ]);
    }
}
