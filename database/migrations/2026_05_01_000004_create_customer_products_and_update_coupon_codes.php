<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Coupon codes now belong to a company and explicitly declare their target type.
        Schema::table('coupon_codes', function (Blueprint $table) {
            $table->foreignId('company_id')
                ->after('id')
                ->constrained('companies')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // The requested column name is kept as-is for schema compatibility.
            $table->boolean('for_wich')
                ->after('discount_rate')
                ->default(false);
        });

        // Customer products snapshot sold product rows for each customer.
        Schema::create('customer_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnUpdate()->restrictOnDelete();
            $table->decimal('product_price', 10, 2);
            $table->decimal('sell_price', 10, 2);
            $table->decimal('tax_price', 10, 2);
            $table->decimal('price_inc_tax', 10, 2);
            $table->foreignId('coupon_code')->nullable()->constrained('coupon_codes')->nullOnDelete()->cascadeOnUpdate();
            $table->boolean('status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop dependent rows first so the coupon code change can be rolled back safely.
        Schema::dropIfExists('customer_products');

        // Remove the added coupon code fields in reverse order.
        Schema::table('coupon_codes', function (Blueprint $table) {
            $table->dropConstrainedForeignId('company_id');
            $table->dropColumn('for_wich');
        });
    }
};
