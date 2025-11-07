<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();

            // Basic Website Settings
            $table->string('project_name')->nullable();
            $table->string('time_zone')->default('Asia/Kolkata');
            $table->string('default_language')->default('English');
            $table->boolean('maintenance_mode')->default(false);

            // Contact & Branding
            $table->string('site_url')->nullable();
            $table->string('contact_info', 500)->nullable();
            $table->text('site_description')->nullable();
            $table->string('logo_path')->nullable();

            // SEO Settings
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            // Social Media Links
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();

            // Email Settings
            $table->string('mail_from_name')->nullable();
            $table->string('mail_from_address')->nullable();
            $table->string('mail_driver')->nullable();
            $table->string('mail_host')->nullable();
            $table->integer('mail_port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_encryption')->nullable();

            // Miscellaneous
            $table->boolean('enable_registration')->default(true);
            $table->string('currency', 10)->default('INR');
            $table->string('date_format')->default('d-m-Y');

            // Audit Fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
