<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up():void{Schema::create('sku_attribute_values',function(Blueprint $t){$t->id();$t->foreignId('sku_id')->constrained('product_skus','sku_id')->cascadeOnDelete();$t->foreignId('attribute_value_id')->constrained('attribute_values','value_id')->cascadeOnDelete();$t->unique(['sku_id','attribute_value_id']);});} public function down():void{Schema::dropIfExists('sku_attribute_values');}};
