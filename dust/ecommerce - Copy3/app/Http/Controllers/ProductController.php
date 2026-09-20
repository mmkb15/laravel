<?php
namespace App\Http\Controllers;
use App\Models\{Product,Category,Brand,ProductSku};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
 public function index(Request $request){
  $products=Product::with(['category','brand'])->when($request->filled('search'),fn($q)=>$q->where('name','like','%'.$request->search.'%')->orWhere('sku','like','%'.$request->search.'%'))->latest()->paginate(10)->withQueryString();
  return view('admin.pages.product.index',compact('products'));
 }
 public function create(){ return view('admin.pages.product.create',['categories'=>Category::where('status','active')->orderBy('name')->get(),'brands'=>Brand::where('status','active')->orderBy('name')->get()]); }
 public function store(Request $request){
  $data=$request->validate(['name'=>'required|string|max:255','category_id'=>'required|exists:categories,id','brand_id'=>'nullable|exists:brands,id','sku'=>'required|string|max:100|unique:products,sku','price'=>'required|numeric|min:0','sale_price'=>'nullable|numeric|min:0|lte:price','stock'=>'required|integer|min:0','status'=>'required|in:active,inactive','description'=>'nullable|string','image'=>'nullable|image|max:2048']);
  if($request->hasFile('image')) $data['image']=$request->file('image')->store('products','public');
  $data['slug']=Str::slug($data['name']).'-'.Str::lower(Str::random(6));
  $product=Product::create($data); ProductSku::create(['product_id'=>$product->id,'sku'=>$product->sku,'price'=>$product->sale_price ?: $product->price,'stock'=>$product->stock,'status'=>$product->status]);
  return redirect()->route('products.index')->with('success','Product created successfully.');
 }
 public function edit(Product $product){ return view('admin.pages.product.edit',['product'=>$product,'categories'=>Category::orderBy('name')->get(),'brands'=>Brand::orderBy('name')->get()]); }
 public function update(Request $request,Product $product){
  $data=$request->validate(['name'=>'required|string|max:255','category_id'=>'required|exists:categories,id','brand_id'=>'nullable|exists:brands,id','sku'=>['required','string','max:100',Rule::unique('products','sku')->ignore($product->id)],'price'=>'required|numeric|min:0','sale_price'=>'nullable|numeric|min:0|lte:price','stock'=>'required|integer|min:0','status'=>'required|in:active,inactive','description'=>'nullable|string','image'=>'nullable|image|max:2048']);
  if($request->hasFile('image')){ if($product->image) Storage::disk('public')->delete($product->image); $data['image']=$request->file('image')->store('products','public'); }
  $data['slug']=Str::slug($data['name']).'-'.$product->id; $product->update($data);
  ProductSku::updateOrCreate(['product_id'=>$product->id],['sku'=>$product->sku,'price'=>$product->sale_price ?: $product->price,'stock'=>$product->stock,'status'=>$product->status]);
  return redirect()->route('products.index')->with('success','Product updated successfully.');
 }
 public function destroy(Product $product){ if($product->image) Storage::disk('public')->delete($product->image); $product->delete(); return back()->with('success','Product deleted successfully.'); }
}
