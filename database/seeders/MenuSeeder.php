<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Step 1: Define parent menus first (null parent_id)
        $menus = [
            // Parent menus
            ['id' => 1, 'title' => 'Dashboard', 'url' => 'home', 'icon' => 'ri-home-8-line', 'parent_id' => null, 'permission_name' => 'access_dashboard', 'permission_id' => 31, 'order' => 1, 'data_key' => 'home', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'title' => 'Master Settings', 'url' => '#', 'icon' => 'ri-settings-3-line', 'parent_id' => null, 'permission_name' => 'access_master_settings', 'permission_id' => 32, 'order' => 2, 'data_key' => 'master_settings', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'title' => 'Utilities', 'url' => '#', 'icon' => 'ri-file-list-3-line', 'parent_id' => null, 'permission_name' => 'access_utilities', 'permission_id' => 39, 'order' => 3, 'data_key' => 'logs', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Child menus
            ['id' => 3, 'title' => 'Permission Groups', 'url' => 'permission-groups', 'icon' => 'ri-group-line', 'parent_id' => 2, 'permission_name' => 'access_permission_groups', 'permission_id' => 33, 'order' => 1, 'data_key' => 'permission_groups', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'title' => 'Permissions', 'url' => 'permissions', 'icon' => 'ri-key-2-line', 'parent_id' => 2, 'permission_name' => 'access_permissions', 'permission_id' => 34, 'order' => 2, 'data_key' => 'permissions', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'title' => 'Roles', 'url' => 'roles', 'icon' => 'ri-shield-user-line', 'parent_id' => 2, 'permission_name' => 'access_roles', 'permission_id' => 35, 'order' => 3, 'data_key' => 'roles', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'title' => 'Users', 'url' => 'users', 'icon' => 'ri-user-3-line', 'parent_id' => 2, 'permission_name' => 'access_users', 'permission_id' => 36, 'order' => 4, 'data_key' => 'users', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'title' => 'Menus', 'url' => 'menus', 'icon' => 'ri-menu-line', 'parent_id' => 8, 'permission_name' => 'access_menus', 'permission_id' => 37, 'order' => 5, 'data_key' => 'menus', 'status' => 1, 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        // Ensure foreign key dependencies are respected
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        foreach ($menus as $menu) {
            DB::table('menus')->updateOrInsert(['id' => $menu['id']], $menu);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
