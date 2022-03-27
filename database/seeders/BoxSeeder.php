<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM boxes");
        DB::table("boxes")->insert([
            [
                'id' => 1,
                'title' => 'Box One',
                'image' => 'images.png',
                'description' => 'This is insta daleel',
            ],
            [
                'id' => 2,
                'title' => 'Box Two',
                'image' => 'images.png',
                'description' => 'This is insta daleel',
            ],
        ]);
    }
}
