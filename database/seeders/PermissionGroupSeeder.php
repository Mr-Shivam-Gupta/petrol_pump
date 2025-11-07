<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionGroupSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            ['id' => 1, 'name' => 'Permission Group', 'category' => 'Administration', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Permission', 'category' => 'Administration', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 3, 'name' => 'Roles', 'category' => 'Administration', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Users', 'category' => 'Administration', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Menus', 'category' => 'Administration', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Navigation', 'category' => 'Navigation', 'status' => 1, 'created_by' => 1, 'updated_by' => null, 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($groups as $group) {
            DB::table('permission_groups')->updateOrInsert(['id' => $group['id']], $group);
        }
    }
}
