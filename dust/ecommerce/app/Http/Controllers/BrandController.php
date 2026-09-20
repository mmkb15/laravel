<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.pages.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|min:2|max:100',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Active,Inactive',
        ]);

        $brand = Brand::create([
            'name'   => $request->name,
            'slug'   => Str::slug($request->name) . '-' . uniqid(),
            'status' => $request->status,
        ]);

        if ($request->hasFile('image')) {
            $brand->image = $request->file('image')->store('brands', 'public');
            $brand->save();
        }

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand created successfully');
    }

    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.pages.brand.show', compact('brand'));
    }

    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.pages.brand.edit', compact('brand'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'   => 'required|min:2|max:100',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Active,Inactive',
        ]);

        $brand = Brand::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($brand->image) {
                Storage::disk('public')->delete($brand->image);
            }
            $brand->image = $request->file('image')->store('brands', 'public');
        }

        $brand->name   = $request->name;
        $brand->status = $request->status;
        $brand->save();

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand updated successfully');
    }

    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);

        if ($brand->image) {
            Storage::disk('public')->delete($brand->image);
        }

        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand deleted successfully');
    }
}
