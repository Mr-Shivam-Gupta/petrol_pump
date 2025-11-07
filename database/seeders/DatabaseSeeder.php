<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('tenants')->truncate();
        DB::table('plans')->truncate();
        DB::table('users')->truncate();
        $this->call(SuperAdminSeeder::class);
        $this->call([
            PlanSeeder::class,
            TenantSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            ThemeCustomizerSeeder::class,
            PermissionGroupSeeder::class,
            PermissionSeeder::class,
            MenuSeeder::class,
            GeneralSettingSeeder::class,
            ModelHasRoleSeeder::class,
        ]);
    }
}
