<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::withCount('products')
            ->when($request->filled('search'), fn ($q) => $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.pages.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.pages.brand.form', ['brand' => new Brand(), 'mode' => 'create']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:brands,name',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['slug'] = Str::slug($data['name']) . '-' . Str::lower(Str::random(5));

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('brands', 'public');
        }

        Brand::create($data);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.pages.brand.form', compact('brand') + ['mode' => 'edit']);
    }

    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:brands,name,' . $brand->id,
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'remove_image' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($data['name']) . '-' . $brand->id;

        if ($request->hasFile('image')) {
            if ($brand->image && ! str_starts_with($brand->image, 'assets/')) {
                Storage::disk('public')->delete($brand->image);
            }
            $data['image'] = $request->file('image')->store('brands', 'public');
        } elseif ($request->boolean('remove_image')) {
            if ($brand->image && ! str_starts_with($brand->image, 'assets/')) {
                Storage::disk('public')->delete($brand->image);
            }
            $data['image'] = null;
        }

        unset($data['remove_image']);

        $brand->update($data);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->products()->exists()) {
            return back()->with('error', 'Cannot delete a brand that has products.');
        }

        if ($brand->image && ! str_starts_with($brand->image, 'assets/')) {
            Storage::disk('public')->delete($brand->image);
        }

        $brand->delete();

        return back()->with('success', 'Brand deleted successfully.');
    }
}
