<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeCustomizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'id' => 1,
                'user_id' => 1,
                'layout' => 'vertical',
                'sidebar_user_profile' => 0,
                'theme' => 'interactive',
                'color_scheme' => 'light',
                'sidebar_visibility' => 'show',
                'layout_width' => 'fluid',
                'layout_position' => 'fixed',
                'topbar_color' => 'dark',
                'sidebar_size' => 'lg',
                'sidebar_view' => 'default',
                'sidebar_color' => 'light',
                'sidebar_image' => 'none',
                'primary_color' => 'default',
                'preloader' => 'enable',
                'body_image' => 'none',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'layout' => 'vertical',
                'sidebar_user_profile' => 0,
                'theme' => 'interactive',
                'color_scheme' => 'light',
                'sidebar_visibility' => 'show',
                'layout_width' => 'fluid',
                'layout_position' => 'fixed',
                'topbar_color' => 'dark',
                'sidebar_size' => 'lg',
                'sidebar_view' => 'default',
                'sidebar_color' => 'light',
                'sidebar_image' => 'none',
                'primary_color' => 'default',
                'preloader' => 'enable',
                'body_image' => 'none',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('theme_customizer')->upsert($rows, ['id']);
    }
}
