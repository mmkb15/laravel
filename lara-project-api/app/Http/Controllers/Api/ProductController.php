<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\UploadImgService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->brand_id) {
            $query->where('brand_id', $request->brand_id);
        }

        $products = $query->with('category', 'brand')
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json([
            'success'    => true,
            'products'   => $products,
            'categories' => Category::orderBy('name', 'asc')->get(),
            'brands'     => Brand::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if($request->active) {
        //     return response()->json($request->active);
        // }else{
        //     return response()->json("image not found");
        // }

        $validated = $request->validate([
            'name'          => 'required|min:3',
            'price'         => 'required|numeric',
            'quantity'      => 'required|integer',
            'reorder_level' => 'required|integer',
            'description'   => 'required|string',
            'category_id'   => 'required|exists:categories,id',
            'brand_id'      => 'required|exists:brands,id',
            // 'active'        => 'boolean',
            'image'         => 'image|mimes:jpeg,png,jpg|max:500',
        ]);



        if ($request->hasFile('image')) {
            $validated['image'] = UploadImgService::upload($request->image, 'uploads/products');
        }

        $validated['active'] = $request->boolean('active');

        $product = Product::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully.',
            'product' => $product->load('category', 'brand'),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json([
            'success' => true,
            'product' => $product->load('category', 'brand'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'          => 'required|min:3',
            'price'         => 'required|numeric',
            'quantity'      => 'required|integer',
            'reorder_level' => 'required|integer',
            'description'   => 'required|string',
            'category_id'   => 'required|exists:categories,id',
            'brand_id'      => 'required|exists:brands,id',
            'active'        => 'boolean',
            'image'         => 'image|mimes:jpeg,png,jpg|max:500',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $validated['image'] = UploadImgService::upload($request->image, 'uploads/products');
        }

        if ($request->has('active')) {
            $validated['active'] = $request->boolean('active');
        }

        $product->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully.',
            'product' => $product->load('category', 'brand'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully.',
        ]);
    }
}
