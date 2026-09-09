<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\UploadImgService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::with('category','brand')->orderby('id', 'desc')->get();  
        // $brands = Product::with('brand')->orderby('id', 'desc')->get();  
        // dd($products->first()->category->name);
        // return view('admin.pages.product.index', compact('products','brands'));
        return view('admin.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.pages.product.create',compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // For Multiple Image
            // 'image'         => 'required|array',
            // 'image*'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',


            'name'          => 'required|min:3',
            // For Single Image
            'image'         => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ],
            [
                'name.required' => 'fill it bro',
                'name.min' => 'type more then 3 characters ',
                'image.max'     => 'image size is too large',
            ]
        );
        if($request->hasFile('image')){
            // dd('has image');
            // $imgName = time() . '.' . $request->image->extension();
            // dd($imgName);
            // $request->image->move(public_path('uploads'),$imgName);

            $imgName = UploadImgService::upload($request->image, 'uploads/products');

            Product::create([
                'name'          => $request->name,
                'price'         => $request->price,
                'quantity'      => $request->qty,
                'reorder_level' => $request->reorder,
                'description'   => $request->desc,
                'category_id'   => $request->category_id,
                'brand_id'      => $request->brand_id,
                'active'        => $request->active ? 1 : 0,
                'image'         => $imgName,
            ]);
            return redirect()->route('products.index')->with('success', 'Product created successfully.');

        }else{
            // dd('no image');
            Product::create([
                'name'          => $request->name,
                'price'         => $request->price,
                'quantity'      => $request->qty,
                'reorder_level' => $request->reorder,
                'description'   => $request->desc,
                'category_id'   => $request->category_id,
                'brand_id'      => $request->brand_id,
                'active'        => $request->active ? 1 : 0,
                // 'image'         => "uploads/" . $imgName,
            ]);
            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

            // dd($product->image);
        if($product->image) {
            unlink(public_path($product->image));
        }
        Product::destroy($product->id);
        return redirect()->route('products.index')->with('success', 'Prodcut deleted successfully');


    }
}
