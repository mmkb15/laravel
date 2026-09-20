<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category','brand','skus'])
            ->where('is_active', 1)
            ->when($request->filled('search'), fn ($q) => $q->where('name','like','%'.$request->search.'%'))
            ->when($request->filled('category'), fn ($q) => $q->where('category_id',$request->category))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('shop.index', compact('products'));
    }

    public function show(Product $product)
    {
        abort_unless($product->is_active, 404);
        $product->load(['category','brand','skus']);
        return view('shop.show', compact('product'));
    }
}
