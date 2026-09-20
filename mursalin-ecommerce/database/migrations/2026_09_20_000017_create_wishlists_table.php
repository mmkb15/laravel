<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up():void{Schema::create('wishlists',function(Blueprint $t){$t->id('wishlist_id');$t->foreignId('user_id')->constrained('users','user_id')->cascadeOnDelete();$t->foreignId('product_id')->constrained('products','product_id')->cascadeOnDelete();$t->timestamp('added_at')->useCurrent();$t->unique(['user_id','product_id']);});} public function down():void{Schema::dropIfExists('wishlists');}};
