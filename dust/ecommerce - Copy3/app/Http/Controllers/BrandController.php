<?php
namespace App\Http\Controllers;
use App\Models\Brand; use Illuminate\Http\Request; use Illuminate\Support\Str;
class BrandController extends Controller
{
 public function index(Request $request){ $brands=Brand::withCount('products')->when($request->filled('search'),fn($q)=>$q->where('name','like','%'.$request->search.'%'))->latest()->paginate(10)->withQueryString(); return view('admin.pages.brand.index',compact('brands')); }
 public function create(){ return view('admin.pages.brand.form',['brand'=>new Brand(),'mode'=>'create']); }
 public function store(Request $request){ $data=$request->validate(['name'=>'required|string|max:100|unique:brands,name','description'=>'nullable|string','status'=>'required|in:active,inactive']); $data['slug']=Str::slug($data['name']).'-'.Str::lower(Str::random(5)); Brand::create($data); return redirect()->route('brands.index')->with('success','Brand created successfully.'); }
 public function edit(Brand $brand){ return view('admin.pages.brand.form',compact('brand')+['mode'=>'edit']); }
 public function update(Request $request,Brand $brand){ $data=$request->validate(['name'=>'required|string|max:100|unique:brands,name,'.$brand->id,'description'=>'nullable|string','status'=>'required|in:active,inactive']); $data['slug']=Str::slug($data['name']).'-'.$brand->id; $brand->update($data); return redirect()->route('brands.index')->with('success','Brand updated successfully.'); }
 public function destroy(Brand $brand){ if($brand->products()->exists()) return back()->with('error','Cannot delete a brand that has products.'); $brand->delete(); return back()->with('success','Brand deleted successfully.'); }
}
