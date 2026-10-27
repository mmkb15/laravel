<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category', 'brand', 'skus'])
            ->when($request->filled('search'), fn ($q) => $q->where('name', 'like', '%'.$request->search.'%'))
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.pages.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.pages.product.create', [
            'product' => new Product(),
            'sku' => null,
            'categories' => Category::orderBy('name')->get(),
            'brands' => Brand::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150'],
            'category_id' => ['required','exists:categories,id'],
            'brand_id' => ['nullable','exists:brands,id'],
            'description' => ['nullable','string'],
            'is_active' => ['required','boolean'],
            'sku_code' => ['required','string','max:100','unique:product_skus,sku_code'],
            'price' => ['required','numeric','min:0'],
            'stock_quantity' => ['required','integer','min:0'],
            'sku_image' => ['nullable','image','max:2048'],
        ]);

        $product = DB::transaction(function () use ($request, $data) {
            $slug = $this->uniqueSlug($data['name']);

            $product = Product::create([
                'category_id' => $data['category_id'],
                'brand_id' => $data['brand_id'] ?? null,
                'name' => $data['name'],
                'slug' => $slug,
                'description' => $data['description'] ?? null,
                'is_active' => $data['is_active'],
            ]);

            $image = $request->hasFile('sku_image')
                ? $request->file('sku_image')->store('products', 'public')
                : null;

            $product->skus()->create([
                'sku_code' => $data['sku_code'],
                'price' => $data['price'],
                'stock_quantity' => $data['stock_quantity'],
                'image_url' => $image,
            ]);

            return $product;
        });

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $product->load('skus');
        return view('admin.pages.product.edit', [
            'product' => $product,
            'categories' => Category::orderBy('name')->get(),
            'brands' => Brand::orderBy('name')->get(),
            'sku' => $product->skus->first(),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $sku = $product->skus()->first();

        $data = $request->validate([
            'name' => ['required','string','max:150'],
            'category_id' => ['required','exists:categories,id'],
            'brand_id' => ['nullable','exists:brands,id'],
            'description' => ['nullable','string'],
            'is_active' => ['required','boolean'],
            'sku_code' => ['required','string','max:100','unique:product_skus,sku_code,'.optional($sku)->id.',sku_id'],
            'price' => ['required','numeric','min:0'],
            'stock_quantity' => ['required','integer','min:0'],
            'sku_image' => ['nullable','image','max:2048'],
        ]);

        DB::transaction(function () use ($request, $data, $product, $sku) {
            $product->update([
                'category_id' => $data['category_id'],
                'brand_id' => $data['brand_id'] ?? null,
                'name' => $data['name'],
                'slug' => $this->uniqueSlug($data['name'], $product->id),
                'description' => $data['description'] ?? null,
                'is_active' => $data['is_active'],
            ]);

            $image = $sku?->image_url;
            if ($request->hasFile('sku_image')) {
                if ($image) Storage::disk('public')->delete($image);
                $image = $request->file('sku_image')->store('products', 'public');
            }

            if ($sku) {
                $sku->update([
                    'sku_code' => $data['sku_code'],
                    'price' => $data['price'],
                    'stock_quantity' => $data['stock_quantity'],
                    'image_url' => $image,
                ]);
            } else {
                $product->skus()->create([
                    'sku_code' => $data['sku_code'],
                    'price' => $data['price'],
                    'stock_quantity' => $data['stock_quantity'],
                    'image_url' => $image,
                ]);
            }
        });

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->load('skus');
        foreach ($product->skus as $sku) {
            if ($sku->image_url) Storage::disk('public')->delete($sku->image_url);
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    private function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name) ?: 'product';
        $slug = $base;
        $i = 1;

        while (Product::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('product_id', '!=', $ignoreId))->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }
}
