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
            $table->string('customer_email')->nullable()->after('shipping_phone');
        });

        DB::table('orders')
            ->whereNull('customer_email')
            ->whereNotNull('notes')
            ->orderBy('id')
            ->chunkById(200, function ($orders): void {
                foreach ($orders as $order) {
                    if (
                        preg_match('/Customer email:\s*([^\r\n]+)/i', $order->notes, $matches) === 1
                        && filter_var(trim($matches[1]), FILTER_VALIDATE_EMAIL)
                    ) {
                        DB::table('orders')
                            ->where('id', $order->id)
                            ->update(['customer_email' => trim($matches[1])]);
                    }
                }
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('customer_email');
        });
    }
};
