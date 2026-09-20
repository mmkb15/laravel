<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('order_number',100)->unique();
            $table->string('customer_name',100);
            $table->string('phone',20);
            $table->string('email',150)->nullable();
            $table->text('shipping_address');
            $table->decimal('subtotal',12,2);
            $table->decimal('discount_amount',10,2)->default(0);
            $table->decimal('shipping_cost',10,2)->default(0);
            $table->decimal('tax_amount',10,2)->default(0);
            $table->decimal('total_amount',12,2);
            $table->enum('status',['Pending','Processing','Shipped','Delivered','Cancelled'])->default('Pending');
            $table->timestamp('order_date')->useCurrent();
        });
    }
    public function down(): void { Schema::dropIfExists('orders'); }
};
