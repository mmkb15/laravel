<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('product_skus', function (Blueprint $table) {
            $table->id('sku_id');
            $table->unsignedBigInteger('product_id');
            $table->string('sku_code',100)->unique();
            $table->decimal('price',10,2);
            $table->integer('stock_quantity')->default(0);
            $table->string('image_url',255)->nullable();
            $table->foreign('product_id')->references('product_id')->on('products')->cascadeOnDelete();
            $table->index('product_id');
        });
    }
    public function down(): void { Schema::dropIfExists('product_skus'); }
};
