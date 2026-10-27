<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder; use App\Models\{Role,User,Category,Brand,Product,ProductSku,Attribute,AttributeValue,Coupon,Order,OrderItem,Payment,Review,Wishlist}; use Illuminate\Support\Facades\Hash; use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder {
 public function run():void {
  $adminRole=Role::create(['name'=>'Admin','description'=>'Store administrator']);$customerRole=Role::create(['name'=>'Customer','description'=>'Store customer']);
  $admin=User::create(['role_id'=>$adminRole->role_id,'name'=>'Mursalin Admin','email'=>'admin@example.com','password'=>Hash::make('password'),'phone'=>'01700000000','status'=>'Active']);
  $customer=User::create(['role_id'=>$customerRole->role_id,'name'=>'Demo Customer','email'=>'customer@example.com','password'=>Hash::make('password'),'phone'=>'01800000000','status'=>'Active']);
  $catNames=['Electronics','Fashion','Home & Living','Beauty','Sports'];$cats=[];foreach($catNames as $n)$cats[]=Category::create(['name'=>$n,'slug'=>Str::slug($n),'description'=>$n.' products']);
  $brands=[];foreach(['Nike','Samsung','Apple','Xiaomi','Generic'] as $n)$brands[]=Brand::create(['name'=>$n,'slug'=>Str::slug($n)]);
  $attrSize=Attribute::create(['name'=>'Size']);foreach(['S','M','L','XL'] as $v)AttributeValue::create(['attribute_id'=>$attrSize->attribute_id,'value'=>$v]);
  $attrColor=Attribute::create(['name'=>'Color']);foreach(['Black','White','Red','Blue'] as $v)AttributeValue::create(['attribute_id'=>$attrColor->attribute_id,'value'=>$v]);
  $products=[['Wireless Headphones',$cats[0],$brands[1],1299],['Running Shoes',$cats[1],$brands[0],2499],['Smart Watch',$cats[0],$brands[3],3499],['Cotton T-Shirt',$cats[1],$brands[0],799],['Desk Lamp',$cats[2],$brands[4],999],['Face Wash',$cats[3],$brands[4],599]];
  foreach($products as [$name,$cat,$brand,$price]){$p=Product::create(['category_id'=>$cat->category_id,'brand_id'=>$brand->brand_id,'name'=>$name,'slug'=>Str::slug($name),'description'=>'Demo product for the Mursalin eCommerce store.','is_active'=>true]);$p->skus()->create(['sku_code'=>'SKU-'.Str::upper(Str::random(8)),'price'=>$price,'stock_quantity'=>25,'image_url'=>null]);}
  Coupon::create(['code'=>'WELCOME10','discount_type'=>'Percentage','discount_value'=>10,'min_order_amount'=>500,'expiry_date'=>now()->addMonths(3)->toDateString(),'is_active'=>true,'usage_limit'=>100]);
  $demo=Product::first();Review::create(['user_id'=>$customer->user_id,'product_id'=>$demo->product_id,'rating'=>5,'comment'=>'Very good demo product.']);Wishlist::create(['user_id'=>$customer->user_id,'product_id'=>$demo->product_id]);
 }
}
