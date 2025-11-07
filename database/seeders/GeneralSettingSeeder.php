<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('general_settings')->updateOrInsert(
            ['id' => 2],
            [
                'project_name' => 'My New Project',
                'time_zone' => 'Asia/Kolkata',
                'default_language' => 'English',
                'maintenance_mode' => 0,
                'site_url' => null,
                'contact_info' => null,
                'site_description' => null,
                'logo_path' => 'uploads/logos/20251025114432/70kmDxMPJw.png',
                'meta_title' => null,
                'meta_keywords' => null,
                'meta_description' => null,
                'facebook_url' => null,
                'twitter_url' => null,
                'instagram_url' => null,
                'linkedin_url' => null,
                'youtube_url' => null,
                'mail_from_name' => null,
                'mail_from_address' => null,
                'mail_driver' => null,
                'mail_host' => null,
                'mail_port' => null,
                'mail_username' => null,
                'mail_encryption' => null,
                'enable_registration' => 0,
                'currency' => 'INR',
                'date_format' => 'd-m-Y',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
