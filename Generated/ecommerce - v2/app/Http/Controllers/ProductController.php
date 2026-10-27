<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category', 'brand'])
            ->when($request->filled('search'), function ($query) use ($request) {
                $term = $request->string('search');
                $query->where(function ($q) use ($term) {
                    $q->where('name', 'like', "%{$term}%")
                        ->orWhere('sku', 'like', "%{$term}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.pages.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.pages.product.create', [
            'categories' => Category::where('status', 'active')->orderBy('name')->get(),
            'brands' => Brand::where('status', 'active')->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'sku' => 'required|string|max:100|unique:products,sku',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string',
            'images' => 'nullable|array|max:8',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data['slug'] = Str::slug($data['name']) . '-' . Str::lower(Str::random(6));
        unset($data['images']);

        DB::transaction(function () use ($request, $data) {
            $product = Product::create($data);

            ProductSku::create([
                'product_id' => $product->id,
                'sku' => $product->sku,
                'price' => $product->sale_price ?: $product->price,
                'stock' => $product->stock,
                'status' => $product->status,
            ]);

            $this->storeProductImages($request, $product);
        });

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        $product->load(['category', 'brand', 'images', 'skus']);

        return view('admin.pages.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $product->load('images');

        return view('admin.pages.product.edit', [
            'product' => $product,
            'categories' => Category::where('status', 'active')->orderBy('name')->get(),
            'brands' => Brand::where('status', 'active')->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'sku' => ['required', 'string', 'max:100', Rule::unique('products', 'sku')->ignore($product->id)],
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string',
            'images' => 'nullable|array|max:8',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
            'remove_images' => 'nullable|array',
            'remove_images.*' => 'integer|exists:product_images,id',
            'primary_image_id' => 'nullable|integer|exists:product_images,id',
        ]);

        unset($data['images'], $data['remove_images'], $data['primary_image_id']);
        $data['slug'] = Str::slug($data['name']) . '-' . $product->id;

        DB::transaction(function () use ($request, $product, $data) {
            $product->update($data);

            foreach ($request->input('remove_images', []) as $imageId) {
                $image = ProductImage::where('product_id', $product->id)->find($imageId);
                if ($image) {
                    $this->deleteProductImage($image);
                }
            }

            $this->storeProductImages($request, $product);

            $chosenPrimaryId = $request->input('primary_image_id');
            $chosenPrimary = $chosenPrimaryId
                ? $product->images()->where('id', $chosenPrimaryId)->first()
                : null;

            $this->syncPrimaryImage($product, $chosenPrimary);

            ProductSku::updateOrCreate(
                ['product_id' => $product->id],
                [
                    'sku' => $product->sku,
                    'price' => $product->sale_price ?: $product->price,
                    'stock' => $product->stock,
                    'status' => $product->status,
                ]
            );
        });

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->load('images');

        foreach ($product->images as $image) {
            $this->deleteProductImage($image);
        }

        if ($product->image && ! str_starts_with($product->image, 'assets/')) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return back()->with('success', 'Product deleted successfully.');
    }

    private function storeProductImages(Request $request, Product $product): void
    {
        $files = $request->file('images', []);
        if (! $files) {
            return;
        }

        $sortOrder = (int) $product->images()->max('sort_order') + 1;
        $hasPrimary = $product->images()->where('is_primary', true)->exists() || filled($product->image);

        foreach ($files as $file) {
            $path = $file->store('products', 'public');
            $product->images()->create([
                'path' => $path,
                'is_primary' => ! $hasPrimary,
                'sort_order' => $sortOrder++,
            ]);
            $hasPrimary = true;
        }

        $this->syncPrimaryImage($product);
    }

    private function syncPrimaryImage(Product $product, ?ProductImage $preferred = null): void
    {
        $primary = $preferred
            ?: $product->images()->where('is_primary', true)->first()
            ?: $product->images()->orderBy('sort_order')->first();

        if ($primary) {
            $product->images()->update(['is_primary' => false]);
            $primary->update(['is_primary' => true]);
            $product->updateQuietly(['image' => $primary->path]);
        } else {
            $product->updateQuietly(['image' => null]);
        }
    }

    private function deleteProductImage(ProductImage $image): void
    {
        if (! str_starts_with($image->path, 'assets/')) {
            Storage::disk('public')->delete($image->path);
        }

        $image->delete();
    }
}
