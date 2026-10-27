<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{StoreController,CartController,CheckoutController,WishlistController,ReviewStoreController,CustomerOrderController,AdminDashboardController,CategoryController,BrandController,ProductController,AttributeController,CouponController,UserController,OrderController,ReviewController};
Route::get('/',[StoreController::class,'home'])->name('home');Route::get('/products',[StoreController::class,'products'])->name('products');Route::get('/products/{product:slug}',[StoreController::class,'show'])->name('products.show');
Route::get('/cart',[CartController::class,'index'])->name('cart.index');Route::post('/cart/add/{sku:sku_id}',[CartController::class,'add'])->name('cart.add');Route::patch('/cart',[CartController::class,'update'])->name('cart.update');Route::delete('/cart/{sku:sku_id}',[CartController::class,'remove'])->name('cart.remove');
Route::middleware('auth')->group(function(){Route::get('/checkout',[CheckoutController::class,'create'])->name('checkout');Route::post('/checkout',[CheckoutController::class,'store'])->name('checkout.store');Route::post('/products/{product:slug}/reviews',[ReviewStoreController::class,'store'])->name('reviews.store');Route::get('/wishlist',[WishlistController::class,'index'])->name('wishlist.index');Route::post('/wishlist/{product:product_id}',[WishlistController::class,'toggle'])->name('wishlist.toggle');Route::get('/orders',[CustomerOrderController::class,'index'])->name('orders.index');Route::get('/orders/{order:order_number}',[CustomerOrderController::class,'show'])->name('orders.show');});
Route::middleware(['auth','role_id:1'])->prefix('admin')->name('admin.')->group(function(){
 Route::get('/',[AdminDashboardController::class,'index'])->name('dashboard');
 Route::resource('categories',CategoryController::class)->except('show');
 Route::resource('brands',BrandController::class)->except('show');
 Route::resource('products',ProductController::class);
 Route::resource('users',UserController::class);
 Route::get('attributes',[AttributeController::class,'index'])->name('attributes.index');Route::post('attributes',[AttributeController::class,'store'])->name('attributes.store');Route::delete('attributes/{attribute}',[AttributeController::class,'destroy'])->name('attributes.destroy');
 Route::get('coupons',[CouponController::class,'index'])->name('coupons.index');Route::post('coupons',[CouponController::class,'store'])->name('coupons.store');Route::delete('coupons/{coupon}',[CouponController::class,'destroy'])->name('coupons.destroy');
 Route::get('orders',[OrderController::class,'index'])->name('orders.index');Route::get('orders/{order}',[OrderController::class,'show'])->name('orders.show');Route::patch('orders/{order}',[OrderController::class,'update'])->name('orders.update');
 Route::get('reviews',[ReviewController::class,'index'])->name('reviews.index');Route::delete('reviews/{review}',[ReviewController::class,'destroy'])->name('reviews.destroy');
});
require __DIR__.'/auth.php';
