<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::withCount('products')->orderBy('name')->paginate(10);
        return view('admin.pages.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.pages.brand.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => ['required','string','max:100','unique:brands,name']]);
        $data['slug'] = Str::slug($data['name']);
        Brand::create($data);
        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.pages.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate(['name' => ['required','string','max:100','unique:brands,name,'.$brand->id]]);
        $data['slug'] = Str::slug($data['name']);
        $brand->update($data);
        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->products()->exists()) {
            return back()->with('error', 'This brand cannot be deleted while products use it.');
        }
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
