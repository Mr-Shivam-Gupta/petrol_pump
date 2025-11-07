<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('tbl_theme_customizer', 'theme_customizer');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('theme_customizer', 'tbl_theme_customizer');
    }
};
