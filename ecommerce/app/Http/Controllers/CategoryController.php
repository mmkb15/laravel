<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
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
            'description' => 'nullable|string',
        ]);

        $category              = new Category();
        $category->name        = $request->name;
        $category->slug        = Str::slug($request->name) . '-' . uniqid();
        $category->parent_id   = $request->parent_id;
        $category->description = $request->description;
        $category->save();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully');
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
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name'        => $request->name,
            'parent_id'   => $request->parent_id,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(string $id)
    {
        $category = Category::destroy($id);

        if ($category) {
            return redirect()
                ->route('categories.index')
                ->with('success', 'Category deleted successfully');
        }

        return redirect()->back()->with('error', 'Category not deleted');
    }
}