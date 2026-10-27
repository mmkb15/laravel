<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);

        $categories = Category::when($request->name, function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.pages.category.index', compact('categories'));
    }

    public function create()
    {
        $parents = Category::orderBy('name', 'asc')->get();
        return view('admin.pages.category.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|min:2|max:100',
            'parent_id'   => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        // Step 1: create the category record FIRST
        $category = Category::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name) . '-' . uniqid(),
            'parent_id'   => $request->parent_id,
            'description' => $request->description,
        ]);

        // Step 2: now $category exists, safe to attach image
        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('categories', 'public');
            $category->save();
        }

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully');
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.pages.category.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $parents  = Category::where('id', '!=', $id)->orderBy('name', 'asc')->get();
        return view('admin.pages.category.edit', compact('category', 'parents'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'        => 'required|min:2|max:100',
            'parent_id'   => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $category->image = $request->file('image')->store('categories', 'public');
        }

        $category->name        = $request->name;
        $category->parent_id   = $request->parent_id;
        $category->description = $request->description;
        $category->save();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
