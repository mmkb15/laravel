<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name',100);
            $table->string('slug',150)->unique();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->index('parent_id');
            $table->foreign('parent_id')->references('category_id')->on('categories')->nullOnDelete();
        });
    }
    public function down(): void { Schema::dropIfExists('categories'); }
};
