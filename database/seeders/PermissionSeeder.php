<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['id' => 1, 'permission_group_id' => 1, 'permission_key' => 'View Permission Group', 'status' => 1, 'name' => 'view_permission_group', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 2, 'permission_group_id' => 1, 'permission_key' => 'Create Permission Group', 'status' => 1, 'name' => 'create_permission_group', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 3, 'permission_group_id' => 1, 'permission_key' => 'Modify Permission Group', 'status' => 1, 'name' => 'modify_permission_group', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 4, 'permission_group_id' => 1, 'permission_key' => 'Remove Permission Group', 'status' => 1, 'name' => 'remove_permission_group', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 5, 'permission_group_id' => 1, 'permission_key' => 'List Permission Group', 'status' => 1, 'name' => 'list_permission_group', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 6, 'permission_group_id' => 1, 'permission_key' => 'Log Permission Group', 'status' => 1, 'name' => 'log_permission_group', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 7, 'permission_group_id' => 2, 'permission_key' => 'View Permission', 'status' => 1, 'name' => 'view_permission', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 8, 'permission_group_id' => 2, 'permission_key' => 'Create Permission', 'status' => 1, 'name' => 'create_permission', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 9, 'permission_group_id' => 2, 'permission_key' => 'Modify Permission', 'status' => 1, 'name' => 'modify_permission', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 10, 'permission_group_id' => 2, 'permission_key' => 'Remove Permission', 'status' => 1, 'name' => 'remove_permission', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 11, 'permission_group_id' => 2, 'permission_key' => 'List Permission', 'status' => 1, 'name' => 'list_permission', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 12, 'permission_group_id' => 2, 'permission_key' => 'Log Permission', 'status' => 1, 'name' => 'log_permission', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 13, 'permission_group_id' => 3, 'permission_key' => 'View Role', 'status' => 1, 'name' => 'view_role', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 14, 'permission_group_id' => 3, 'permission_key' => 'Create Role', 'status' => 1, 'name' => 'create_role', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 15, 'permission_group_id' => 3, 'permission_key' => 'Modify Role', 'status' => 1, 'name' => 'modify_role', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 16, 'permission_group_id' => 3, 'permission_key' => 'Remove Role', 'status' => 1, 'name' => 'remove_role', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 17, 'permission_group_id' => 3, 'permission_key' => 'List Role', 'status' => 1, 'name' => 'list_role', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 18, 'permission_group_id' => 3, 'permission_key' => 'Log Role', 'status' => 1, 'name' => 'log_role', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 19, 'permission_group_id' => 4, 'permission_key' => 'View User', 'status' => 1, 'name' => 'view_user', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 20, 'permission_group_id' => 4, 'permission_key' => 'Create User', 'status' => 1, 'name' => 'create_user', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 21, 'permission_group_id' => 4, 'permission_key' => 'Modify User', 'status' => 1, 'name' => 'modify_user', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 22, 'permission_group_id' => 4, 'permission_key' => 'Remove User', 'status' => 1, 'name' => 'remove_user', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 23, 'permission_group_id' => 4, 'permission_key' => 'List User', 'status' => 1, 'name' => 'list_user', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 24, 'permission_group_id' => 4, 'permission_key' => 'Log User', 'status' => 1, 'name' => 'log_user', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 25, 'permission_group_id' => 5, 'permission_key' => 'View Menu', 'status' => 1, 'name' => 'view_menu', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 26, 'permission_group_id' => 5, 'permission_key' => 'Create Menu', 'status' => 1, 'name' => 'create_menu', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 27, 'permission_group_id' => 5, 'permission_key' => 'Modify Menu', 'status' => 1, 'name' => 'modify_menu', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 28, 'permission_group_id' => 5, 'permission_key' => 'Remove Menu', 'status' => 1, 'name' => 'remove_menu', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 29, 'permission_group_id' => 5, 'permission_key' => 'List Menu', 'status' => 1, 'name' => 'list_menu', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 30, 'permission_group_id' => 5, 'permission_key' => 'Log Menu', 'status' => 1, 'name' => 'log_menu', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 31, 'permission_group_id' => 6, 'permission_key' => 'Access Dashboard', 'status' => 1, 'name' => 'access_dashboard', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 32, 'permission_group_id' => 6, 'permission_key' => 'Access Master Settings', 'status' => 1, 'name' => 'access_master_settings', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 33, 'permission_group_id' => 6, 'permission_key' => 'Access Permission Groups', 'status' => 1, 'name' => 'access_permission_groups', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 34, 'permission_group_id' => 6, 'permission_key' => 'Access Permissions', 'status' => 1, 'name' => 'access_permissions', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 35, 'permission_group_id' => 6, 'permission_key' => 'Access Roles', 'status' => 1, 'name' => 'access_roles', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 36, 'permission_group_id' => 6, 'permission_key' => 'Access Users', 'status' => 1, 'name' => 'access_users', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 37, 'permission_group_id' => 6, 'permission_key' => 'Access Menus', 'status' => 1, 'name' => 'access_menus', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 38, 'permission_group_id' => 4, 'permission_key' => 'Assign Permission', 'status' => 1, 'name' => 'assign_permission', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
            ['id' => 39, 'permission_group_id' => 6, 'permission_key' => 'Access Utilities', 'status' => 1, 'name' => 'access_utilities', 'guard_name' => 'web', 'created_at' => now(), 'created_by' => 1],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
