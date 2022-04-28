<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement("DELETE FROM sub_modules");

        DB::table('sub_modules')->insert([


            //module id 1 start
            [
                'id' => 1,
                'name' => 'All User',
                'key' => 'all_user',
                'position' => 1,
                'route' => 'user.all',
                'module_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Roles',
                'key' => 'roles',
                'position' => 2,
                'route' => 'role.all',
                'module_id' => 1,
            ],
            //module id 1 end

            //module id 2 start
            [
                'id' => 3,
                'name' => 'App Info',
                'key' => 'app_info',
                'position' => 2,
                'route' => 'app.info.all',
                'module_id' => 2,
            ],
            [
                'id' => 4,
                'name' => 'Banner',
                'key' => 'banner',
                'position' => 1,
                'route' => 'banner.all',
                'module_id' => 2,
            ],
            //module id 2 end



            //module id 3 start
            [
                'id' => 5,
                'name' => 'All Category',
                'key' => 'all_category',
                'position' => 1,
                'route' => 'category.all',
                'module_id' => 3,
            ],
            [
                'id' => 6,
                'name' => 'Country',
                'key' => 'country',
                'position' => 2,
                'route' => 'country.all',
                'module_id' => 3,
            ],
            [
                'id' => 7,
                'name' => 'City',
                'key' => 'city',
                'position' => 3,
                'route' => 'city.all',
                'module_id' => 3,
            ],
            [
                'id' => 8,
                'name' => 'Boxes',
                'key' => 'boxes',
                'position' => 4,
                'route' => 'boxes.all',
                'module_id' => 3,
            ],
            [
                'id' => 9,
                'name' => 'All Event',
                'key' => 'all_event',
                'position' => 5,
                'route' => 'event.all',
                'module_id' => 3,
            ],
            [
                'id' => 10,
                'name' => 'All Package',
                'key' => 'all_package',
                'position' => 6,
                'route' => 'package.all',
                'module_id' => 3,
            ],
            [
                'id' => 12,
                'name' => 'All Business',
                'key' => 'all_business',
                'position' => 7,
                'route' => 'business.all',
                'module_id' => 3,
            ],
            [
                'id' => 13,
                'name' => 'All Offer',
                'key' => 'all_offer',
                'position' => 8,
                'route' => 'offer.all',
                'module_id' => 3,
            ],
            //module id 3 end
            

            //module id 4 start
            [
                'id' => 11,
                'name' => 'All Post',
                'key' => 'all_post',
                'position' => 1,
                'route' => 'post.all',
                'module_id' => 4,
            ],
            //module id 4 end


            //module id 5 start
            [
                'id' => 14,
                'name' => 'All Customer',
                'key' => 'all_customer',
                'position' => 1,
                'route' => 'customer.all',
                'module_id' => 5,
            ],
            //module id 5 end


        
        ]);

        //last id 14
    }
}