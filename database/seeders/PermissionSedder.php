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
        ]);

    }
}