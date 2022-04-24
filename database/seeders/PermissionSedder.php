<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement("DELETE FROM permissions");

        DB::table('permissions')->insert([
            [
                'id' => 1,
                'key' => 'user_module',
                'display_name' => 'User Module',
                'module_id' => 1,
            ],
            [
                'id' => 2,
                'key' => 'all_user',
                'display_name' => 'All User',
                'module_id' => 1,
            ],
            [
                'id' => 3,
                'key' => 'add_user',
                'display_name' => '-- Add User',
                'module_id' => 1,
            ],
            [
                'id' => 4,
                'key' => 'edit_user',
                'display_name' => '-- Edit User',
                'module_id' => 1,
            ],
            [
                'id' => 5,
                'key' => 'reset_password',
                'display_name' => '-- Reset Password',
                'module_id' => 1,
            ],
            [
                'id' => 6,
                'key' => 'settings',
                'display_name' => 'Setting Module',
                'module_id' => 2,
            ],
            [
                'id' => 7,
                'key' => 'app_info',
                'display_name' => '-- App Info',
                'module_id' => 2,
            ],
            [
                'id' => 8,
                'key' => 'banner',
                'display_name' => 'Banner',
                'module_id' => 2,
            ],
            [
                'id' => 9,
                'key' => 'add_banner',
                'display_name' => '-- Add Banner',
                'module_id' => 2,
            ],
            [
                'id' => 10,
                'key' => 'edit_banner',
                'display_name' => '-- Edit Banner',
                'module_id' => 2,
            ],
            [
                'id' => 11,
                'key' => 'view_banner',
                'display_name' => '-- View Banner',
                'module_id' => 2,
            ],
            [
                'id' => 12,
                'key' => 'delete_banner',
                'display_name' => '-- Delete Banner',
                'module_id' => 2,
            ],
            [
                'id' => 28,
                'key' => 'app_data_module',
                'display_name' => 'App Datas',
                'module_id' => 3,
            ],
            [
                'id' => 13,
                'key' => 'all_category',
                'display_name' => 'All Category',
                'module_id' => 3,
            ],
            [
                'id' => 14,
                'key' => 'add_category',
                'display_name' => '-- Add Category',
                'module_id' => 3,
            ],
            [
                'id' => 15,
                'key' => 'edit_category',
                'display_name' => '-- Edit Category',
                'module_id' => 3,
            ],
            [
                'id' => 16,
                'key' => 'view_category',
                'display_name' => '-- View Category',
                'module_id' => 3,
            ],
            [
                'id' => 18,
                'key' => 'country',
                'display_name' => 'Country',
                'module_id' => 3,
            ],
            [
                'id' => 19,
                'key' => 'add_country',
                'display_name' => '-- Add Country',
                'module_id' => 3,
            ],
            [
                'id' => 20,
                'key' => 'edit_country',
                'display_name' => '-- Edit Country',
                'module_id' => 3,
            ],
            [
                'id' => 21,
                'key' => 'view_country',
                'display_name' => '-- View Country',
                'module_id' => 3,
            ],
            [
                'id' => 22,
                'key' => 'boxes',
                'display_name' => 'Boxes',
                'module_id' => 3,
            ],
            [
                'id' => 23,
                'key' => 'edit_boxes',
                'display_name' => '-- Edit Boxes',
                'module_id' => 3,
            ],
            [
                'id' => 24,
                'key' => 'city',
                'display_name' => 'City',
                'module_id' => 3,
            ],
            [
                'id' => 25,
                'key' => 'add_city',
                'display_name' => '-- Add City',
                'module_id' => 3,
            ],
            [
                'id' => 26,
                'key' => 'edit_city',
                'display_name' => '-- Edit City',
                'module_id' => 3,
            ],
            [
                'id' => 27,
                'key' => 'view_city',
                'display_name' => '-- View City',
                'module_id' => 3,
            ],
            [
                'id' => 29,
                'key' => 'all_event',
                'display_name' => 'All Event',
                'module_id' => 3,
            ],
            [
                'id' => 30,
                'key' => 'add_event',
                'display_name' => '-- Add Event',
                'module_id' => 3,
            ],
            [
                'id' => 31,
                'key' => 'edit_event',
                'display_name' => '-- Edit Event',
                'module_id' => 3,
            ],
            [
                'id' => 32,
                'key' => 'delete_event',
                'display_name' => '-- Delete Event',
                'module_id' => 3,
            ],
            [
                'id' => 33,
                'key' => 'view_event',
                'display_name' => '-- View Event',
                'module_id' => 3,
            ],
            [
                'id' => 34,
                'key' => 'all_package',
                'display_name' => 'All Package',
                'module_id' => 3,
            ],
            [
                'id' => 35,
                'key' => 'add_package',
                'display_name' => '-- Add Package',
                'module_id' => 3,
            ],
            [
                'id' => 36,
                'key' => 'edit_package',
                'display_name' => '-- Edit Package',
                'module_id' => 3,
            ],
            [
                'id' => 37,
                'key' => 'view_package',
                'display_name' => '-- View Package',
                'module_id' => 3,
            ],
            [
                'id' => 38,
                'key' => 'community_module',
                'display_name' => 'Community Module',
                'module_id' => 4,
            ],
            [
                'id' => 39,
                'key' => 'all_post',
                'display_name' => 'All Post',
                'module_id' => 4,
            ],
            [
                'id' => 40,
                'key' => 'edit_post',
                'display_name' => '-- Edit Post',
                'module_id' => 4,
            ],
            [
                'id' => 41,
                'key' => 'view_post',
                'display_name' => '-- View Post',
                'module_id' => 4,
            ],
            [
                'id' => 42,
                'key' => 'delete_post',
                'display_name' => '-- Delete Post',
                'module_id' => 4,
            ],
            [
                'id' => 43,
                'key' => 'all_business',
                'display_name' => 'All Business',
                'module_id' => 3,
            ],
            [
                'id' => 44,
                'key' => 'Edit_business',
                'display_name' => '-- Edit Business',
                'module_id' => 3,
            ],
            [
                'id' => 45,
                'key' => 'view_business',
                'display_name' => '-- View Business',
                'module_id' => 3,
            ],
            [
                'id' => 46,
                'key' => 'delete_business',
                'display_name' => '-- Delete Business',
                'module_id' => 3,
            ],
        ]);

    }
}