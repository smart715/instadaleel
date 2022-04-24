<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM modules");
        DB::table('modules')->insert([
            [
                'id' => 1,
                'name' => 'User Module',
                'key' => 'user_module',
                'icon' => 'fas fa-users',
                'position' => 1,
                'route' => null
            ],
            
            [
                'id' => 2,
                'name' => 'Setting Module',
                'key' => 'settings',
                'icon' => 'fas fa-cog',
                'position' => 6,
                'route' => null,
            ],

            [
                'id' => 3,
                'name' => 'App Datas',
                'key' => 'app_data_module',
                'icon' => 'fas fa-mobile',
                'position' => 2,
                'route' => null,
            ],

            [
                'id' => 4,
                'name' => 'Community Module',
                'key' => 'community_module',
                'icon' => 'fas fa-hand-holding-heart',
                'position' => 3,
                'route' => null,
            ],
            
        ]);
    }
}