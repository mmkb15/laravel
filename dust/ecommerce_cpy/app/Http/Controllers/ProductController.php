<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')
            ->when($request->name, function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.pages.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.pages.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|min:2|max:255',
            'category_id' => 'required|exists:categories,id',
            'status'      => 'required|in:Active,Inactive',
            'vendor_id'   => 'required|integer',
            'description' => 'required|string',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Step 1: create the product FIRST (no images yet)
        $product = Product::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name) . '-' . uniqid(),
            'category_id' => $request->category_id,
            'vendor_id'   => $request->vendor_id,
            'status'      => $request->status,
            'description' => $request->description,
        ]);

        // Step 2: now $product exists, safe to attach images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('products', 'public');
                $product->images()->create(['image' => $path]);

                if (!$product->image) {
                    $product->image = $path;
                    $product->save();
                }
            }
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully');
    }

    public function show(string $id)
    {
        $product = Product::with(['category', 'brand', 'images'])->findOrFail($id);
        return view('admin.pages.product.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product    = Product::with('images')->findOrFail($id);
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.pages.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'        => 'required|min:2|max:255',
            'category_id' => 'required|exists:categories,id',
            'status'      => 'required|in:Active,Inactive',
            'vendor_id'   => 'required|integer',
            'description' => 'required|string',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $product->name        = $request->name;
        $product->category_id = $request->category_id;
        $product->vendor_id   = $request->vendor_id;
        $product->status      = $request->status;
        $product->description = $request->description;
        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('products', 'public');
                $product->images()->create(['image' => $path]);

                if (!$product->image) {
                    $product->image = $path;
                    $product->save();
                }
            }
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(string $id)
    {
        $product = Product::with('images')->findOrFail($id);

        foreach ($product->images as $img) {
            Storage::disk('public')->delete($img->image);
        }

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
