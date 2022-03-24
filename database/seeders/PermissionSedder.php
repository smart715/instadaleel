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
        ]);
    }
}