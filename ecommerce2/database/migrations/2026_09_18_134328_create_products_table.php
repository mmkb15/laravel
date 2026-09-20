<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('name',150);
            $table->string('slug',200)->unique();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('category_id')->references('category_id')->on('categories')->cascadeOnUpdate()->restrictOnDelete();
            $table->index('brand_id');
            $table->foreign('brand_id')->references('brand_id')->on('brands')->nullOnDelete();
        });
    }
    public function down(): void { Schema::dropIfExists('products'); }
};
