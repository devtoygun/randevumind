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
        // Company types define the business categories that companies can belong to.
        Schema::create('company_types', function (Blueprint $table) {
            $table->id();
            $table->string('type_name');
            $table->boolean('status')->default(true);
        });

        // User roles store reusable role metadata and admin-level flags.
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->boolean('is_admin')->default(false);
            $table->string('access_code')->unique();
        });

        // Media types normalize reusable file categories across company assets.
        Schema::create('media_types', function (Blueprint $table) {
            $table->id();
            $table->string('type_name');
        });

        // Coupon codes are managed separately so customer service sales can reference them.
        Schema::create('coupon_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->date('expiry');
            $table->decimal('discount_rate', 5, 2);
            $table->boolean('status')->default(true);
        });

        // Companies are linked to both a company type and an owning user.
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->foreignId('company_type')->constrained('company_types')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('owner')->constrained('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->text('address');
            $table->string('tax_number');
            $table->string('tax_office');
            $table->boolean('status')->default(true);
        });

        // Company members map users to companies and store their role label in that company.
        Schema::create('company_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('role');
        });

        // Logs capture request-level behavior for analytics and audit trails.
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->string('event');
            $table->text('url');
            $table->string('method', 10);
            $table->string('ip_address', 45)->nullable();
            $table->string('device_type', 20);
            $table->string('browser')->nullable();
            $table->string('browser_version')->nullable();
            $table->string('platform')->nullable();
            $table->string('platform_version')->nullable();
        });

        // Customers belong to a company and store personal contact information for appointments.
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('firstname');
            $table->string('lastname');
            $table->boolean('gender');
            $table->date('birthdate');
            $table->string('email');
            $table->string('phone');
            $table->boolean('status')->default(true);
        });

        // Company media records point to uploaded files and their normalized media type.
        Schema::create('company_medias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('media_type')->constrained('media_types')->cascadeOnUpdate()->restrictOnDelete();
            $table->unsignedBigInteger('file_size');
            $table->string('path');
        });

        // Services define the sellable session-based offerings of a company.
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('service_name');
            $table->text('service_detail');
            $table->unsignedInteger('total_session');
            $table->decimal('price', 10, 2);
            $table->decimal('tax_rate', 5, 2);
            $table->boolean('status')->default(true);
        });

        // Products define the physical or digital items a company can sell.
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('product_name');
            $table->text('product_detail');
            $table->string('product_img');
            $table->decimal('cost_price', 10, 2);
            $table->decimal('sell_price', 10, 2);
            $table->decimal('tax_rate', 5, 2);
            $table->boolean('status')->default(true);
        });

        // Customer services snapshot a sold service package for a specific customer.
        Schema::create('customer_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained('services')->cascadeOnUpdate()->restrictOnDelete();
            $table->unsignedInteger('total_session');
            $table->decimal('service_price', 10, 2);
            $table->decimal('sell_price', 10, 2);
            $table->decimal('tax_price', 10, 2);
            $table->decimal('price_inc_tax', 10, 2);
            $table->foreignId('coupon_code')->nullable()->constrained('coupon_codes')->nullOnDelete()->cascadeOnUpdate();
            $table->boolean('status')->default(true);
        });

        // Appointments are tied to purchased customer services and the creator user.
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained('customer_services')->cascadeOnUpdate()->restrictOnDelete();
            $table->dateTime('event_start');
            $table->dateTime('event_end');
            $table->unsignedInteger('session_count');
            $table->foreignId('created_by')->constrained('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->boolean('status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop dependent tables first so foreign key constraints unwind cleanly.
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('customer_services');
        Schema::dropIfExists('products');
        Schema::dropIfExists('services');
        Schema::dropIfExists('company_medias');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('logs');
        Schema::dropIfExists('company_members');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('coupon_codes');
        Schema::dropIfExists('media_types');
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('company_types');
    }
};
