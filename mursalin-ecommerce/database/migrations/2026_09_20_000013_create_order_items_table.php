<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up():void{Schema::create('order_items',function(Blueprint $t){$t->id('order_item_id');$t->foreignId('order_id')->constrained('orders','order_id')->cascadeOnDelete();$t->foreignId('sku_id')->constrained('product_skus','sku_id');$t->integer('quantity');$t->decimal('price',10,2);});} public function down():void{Schema::dropIfExists('order_items');}};
