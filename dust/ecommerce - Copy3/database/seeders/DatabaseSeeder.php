<?php
namespace Database\Seeders;
use App\Models\{User,Category,Brand,Product,ProductSku,Order};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
 public function run(): void {
  $admin=User::updateOrCreate(['email'=>'admin@example.com'],['name'=>'Admin User','password'=>Hash::make('password'),'role'=>'admin','phone'=>'01700000000','address'=>'Dhaka, Bangladesh']);
  User::updateOrCreate(['email'=>'customer@example.com'],['name'=>'Demo Customer','password'=>Hash::make('password'),'role'=>'customer','phone'=>'01800000000','address'=>'Dhaka, Bangladesh']);
  $electronics=Category::updateOrCreate(['name'=>'Electronics'],['slug'=>'electronics','description'=>'Electronic products','status'=>'active']);
  $fashion=Category::updateOrCreate(['name'=>'Fashion'],['slug'=>'fashion','description'=>'Fashion products','status'=>'active']);
  $brand=Brand::updateOrCreate(['name'=>'Demo Brand'],['slug'=>'demo-brand','description'=>'Demo brand','status'=>'active']);
  $products=[['name'=>'Wireless Headphone','sku'=>'WH-1001','price'=>2500,'sale_price'=>2200,'stock'=>25,'category_id'=>$electronics->id],['name'=>'Smart Watch','sku'=>'SW-1002','price'=>4500,'sale_price'=>3999,'stock'=>12,'category_id'=>$electronics->id],['name'=>'Classic T-Shirt','sku'=>'TS-1003','price'=>1200,'sale_price'=>999,'stock'=>4,'category_id'=>$fashion->id]];
  foreach($products as $p){ $p['brand_id']=$brand->id; $p['slug']=Str::slug($p['name']); $p['image']='products/1.png'; $p['status']='active'; $product=Product::updateOrCreate(['sku'=>$p['sku']],$p); ProductSku::updateOrCreate(['product_id'=>$product->id],['sku'=>$product->sku,'price'=>$product->sale_price ?: $product->price,'stock'=>$product->stock,'status'=>'active']); }
  $customer=User::where('email','customer@example.com')->first();
  if(Order::count()===0){ $p=Product::first(); $unit=(float)($p->sale_price ?: $p->price); $qty=2; $sub=$unit*$qty; $order=Order::create(['order_number'=>'ORD-DEMO-1001','user_id'=>$customer->id,'subtotal'=>$sub,'shipping_cost'=>0,'discount'=>0,'total'=>$sub,'payment_method'=>'cod','payment_status'=>'paid','status'=>'delivered','shipping_name'=>$customer->name,'shipping_phone'=>$customer->phone,'shipping_address'=>$customer->address]); $order->items()->create(['product_id'=>$p->id,'product_name'=>$p->name,'quantity'=>$qty,'unit_price'=>$unit,'subtotal'=>$sub]); }
 }
}
