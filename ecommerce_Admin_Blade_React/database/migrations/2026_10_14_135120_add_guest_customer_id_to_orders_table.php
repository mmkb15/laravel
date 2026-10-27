<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('guest_customer_id')
                ->nullable()
                ->after('user_id')
                ->constrained()
                ->nullOnDelete();
        });

        DB::table('orders')
            ->whereNull('user_id')
            ->select('shipping_phone')
            ->distinct()
            ->orderBy('shipping_phone')
            ->chunk(200, function ($phones): void {
                foreach ($phones as $phone) {
                    $orders = DB::table('orders')
                        ->whereNull('user_id')
                        ->where('shipping_phone', $phone->shipping_phone);

                    $details = (clone $orders)
                        ->selectRaw(
                            'MAX(shipping_name) as name, MAX(customer_email) as email, MAX(shipping_address) as address'
                        )
                        ->first();

                    if (! $details) {
                        continue;
                    }

                    $guestCustomerId = DB::table('guest_customers')->insertGetId([
                        'name' => $details->name,
                        'email' => $details->email,
                        'phone' => $phone->shipping_phone,
                        'address' => $details->address,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    $orders->update(['guest_customer_id' => $guestCustomerId]);
                }
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropConstrainedForeignId('guest_customer_id');
        });
    }
};
