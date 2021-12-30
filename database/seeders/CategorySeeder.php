<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            ['id' => 1, 'name' => 'Iphone', 'slug' => 'iphone'],
            ['id' => 2, 'name' => 'Samsung', 'slug' => 'samsung'],
            ['id' => 3, 'name' => 'Nokia', 'slug' => 'nokia'],
            ['id' => 4, 'name' => 'HTC', 'slug' => 'htc'],
            ['id' => 5, 'name' => 'Sony', 'slug' => 'sony'],
            ['id' => 6, 'name' => 'LG', 'slug' => 'lg'],
            ['id' => 7, 'name' => 'Motorola', 'slug' => 'motorola'],

           
        
        ];

        DB::table('categories')->delete();
        DB::table('categories')->insert($categories);
    }
}