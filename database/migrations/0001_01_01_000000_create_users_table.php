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
        // Core user identity fields live here because the project will manage
        // both personal and company-linked records from the same account base.
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Keep first and last names separate for reporting and filtering.
            $table->string('firstname');
            $table->string('lastname');

            // Email remains a unique identifier for user-level communication.
            $table->string('email')->unique();

            // Phone is optional at registration time, so it stays nullable.
            $table->string('phone')->nullable();

            // Verification timestamps are tracked separately for email and phone.
            $table->timestamp('emailverifiedat')->nullable();
            $table->timestamp('phoneverifiedat')->nullable();

            // Optional profile fields can be completed after the account exists.
            $table->date('birthday')->nullable();
            $table->boolean('gender')->nullable();

            // Status and onboarding flags support account lifecycle flows.
            $table->boolean('status')->default(true);
            $table->boolean('first_login')->default(true);
        });

        // Password reset support remains available even if authentication rules evolve.
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Session storage keeps Laravel's database-backed session driver working.
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
