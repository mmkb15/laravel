<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up():void{Schema::create('product_skus',function(Blueprint $t){$t->id('sku_id');$t->foreignId('product_id')->constrained('products','product_id')->cascadeOnDelete();$t->string('sku_code',100)->unique();$t->decimal('price',10,2);$t->integer('stock_quantity')->default(0);$t->string('image_url',255)->nullable();$t->index('product_id');});} public function down():void{Schema::dropIfExists('product_skus');}};
