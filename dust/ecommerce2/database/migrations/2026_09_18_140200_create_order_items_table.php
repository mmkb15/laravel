<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_item_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('sku_id');
            $table->integer('quantity');
            $table->decimal('price',10,2);
            $table->foreign('order_id')->references('order_id')->on('orders')->cascadeOnDelete();
            $table->foreign('sku_id')->references('sku_id')->on('product_skus')->restrictOnDelete();
            $table->index('sku_id');
        });
    }
    public function down(): void { Schema::dropIfExists('order_items'); }
};
