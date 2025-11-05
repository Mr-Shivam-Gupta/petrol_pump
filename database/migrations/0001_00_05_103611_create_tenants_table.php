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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('domain')->nullable();

            $table->string('contact')->unique();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('logo')->nullable();
            $table->string('address')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('license_number')->nullable();

            $table->enum('type', ['subscription', 'direct']);
            $table->string('plan')->nullable();
            $table->enum('isolation', ['shared_schema', 'separate_schema', 'separate_db']);
            $table->string('database')->nullable();
            $table->string('db_username')->nullable();
            $table->string('db_password')->nullable();

            $table->tinyInteger('status')->default(1)->comment('1 = active, 0 = inactive');

            $table->timestamps();
        });

        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->nullable()->constrained('plans')->nullOnDelete();
            $table->foreignId('tenant_id')->constrained('tenants')->cascadeOnDelete();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_trial')->default(false);
            $table->tinyInteger('subscription_status')->default(1)->comment('1 = active, 0 = expired, 2 = trial, 3 = canceled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
