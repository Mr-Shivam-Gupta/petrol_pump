<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_logs', function (Blueprint $table) {
            $table->string('device_type')->nullable()->after('login_method');
            $table->text('device_details')->nullable()->after('device_type');
        });
    }

    public function down(): void
    {
        Schema::table('user_logs', function (Blueprint $table) {
            $table->dropColumn(['device_type', 'device_details']);
        });
    }
};
