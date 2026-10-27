<?php
namespace App\Http\Controllers;
use App\Models\Category; use Illuminate\Http\Request; use Illuminate\Support\Str;
class CategoryController extends Controller
{
 public function index(Request $request){ $categories=Category::with('parent')->withCount('products')->when($request->filled('search'),fn($q)=>$q->where('name','like','%'.$request->search.'%'))->latest()->paginate(10)->withQueryString(); return view('admin.pages.category.index',compact('categories')); }
 public function create(){ return view('admin.pages.category.create',['parents'=>Category::orderBy('name')->get()]); }
 public function store(Request $request){ $data=$request->validate(['name'=>'required|string|min:2|max:100','parent_id'=>'nullable|exists:categories,id','description'=>'nullable|string','status'=>'required|in:active,inactive']); $data['slug']=Str::slug($data['name']).'-'.Str::lower(Str::random(5)); Category::create($data); return redirect()->route('categories.index')->with('success','Category created successfully.'); }
 public function edit(Category $category){ return view('admin.pages.category.edit',['category'=>$category,'parents'=>Category::where('id','!=',$category->id)->orderBy('name')->get()]); }
 public function update(Request $request,Category $category){ $data=$request->validate(['name'=>'required|string|min:2|max:100','parent_id'=>'nullable|exists:categories,id','description'=>'nullable|string','status'=>'required|in:active,inactive']); $data['slug']=Str::slug($data['name']).'-'.$category->id; $category->update($data); return redirect()->route('categories.index')->with('success','Category updated successfully.'); }
 public function destroy(Category $category){ if($category->products()->exists()) return back()->with('error','Cannot delete a category that has products.'); $category->delete(); return back()->with('success','Category deleted successfully.'); }
}
