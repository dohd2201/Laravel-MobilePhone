<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['id' => 1, 'name' => 'Iphone 1', 'code' => 'IP1', 'slug' => 'iphone-1','price' => 500000,'image' => "iphone7-plus-black-select-2016.jpg", 'warranty' => "hot", 'accessories' => "rat nhieu", 'condition' => "nat bet", 'promotion' => '50%', 'status' => 1, 'description' => 'May dien thoai xin nhat VN', 'featured' => 1, 'categories_id' => 1],
            ['id' => 2, 'name' => 'Iphone 2', 'code' => 'IP2', 'slug' => 'iphone-2','price' => 500000, 'image' => "iphone7-plus-black-select-2016.jpg", 'warranty' => "hot", 'accessories' => "rat nhieu", 'condition' => "nat bet", 'promotion' => '50%', 'status' => 0, 'description' => 'May dien thoai xin nhat VN', 'featured' => 0, 'categories_id' => 2],
            ['id' => 3, 'name' => 'Iphone 3', 'code' => 'IP3', 'slug' => 'iphone-3','price' => 500000,'image' => "iphone7-plus-black-select-2016.jpg", 'warranty' => "hot", 'accessories' => "rat nhieu", 'condition' => "nat bet", 'promotion' => '50%', 'status' => 1, 'description' => 'May dien thoai xin nhat VN', 'featured' => 1, 'categories_id' => 3],
            ['id' => 4, 'name' => 'Iphone 4', 'code' => 'IP4', 'slug' => 'iphone-4','price' => 500000,'image' => "iphone7-plus-black-select-2016.jpg", 'warranty' => "hot", 'accessories' => "rat nhieu", 'condition' => "nat bet", 'promotion' => '50%', 'status' => 0, 'description' => 'May dien thoai xin nhat VN', 'featured' => 1, 'categories_id' => 1],
            ['id' => 5, 'name' => 'Iphone 5', 'code' => 'IP5', 'slug' => 'iphone-5','price' => 500000,'image' => "iphone7-plus-black-select-2016.jpg", 'warranty' => "hot", 'accessories' => "rat nhieu", 'condition' => "nat bet", 'promotion' => '50%', 'status' => 1, 'description' => 'May dien thoai xin nhat VN', 'featured' => 0, 'categories_id' => 1],
            ['id' => 6, 'name' => 'Iphone 6', 'code' => 'IP6', 'slug' => 'iphone-6','price' => 500000,'image' => "iphone7-plus-black-select-2016.jpg", 'warranty' => "hot", 'accessories' => "rat nhieu", 'condition' => "nat bet", 'promotion' => '50%', 'status' => 0, 'description' => 'May dien thoai xin nhat VN', 'featured' => 1, 'categories_id' => 4],
            ['id' => 7, 'name' => 'Iphone 7', 'code' => 'IP7', 'slug' => 'iphone-7', 'price' => 500000,'image' => "iphone7-plus-black-select-2016.jpg",'warranty' => "hot", 'accessories' => "rat nhieu", 'condition' => "nat bet", 'promotion' => '50%', 'status' => 1, 'description' => 'May dien thoai xin nhat VN', 'featured' => 1, 'categories_id' => 2],
            ['id' => 8, 'name' => 'Iphone 8', 'code' => 'IP8', 'slug' => 'iphone-8', 'price' => 500000,'image' => "iphone7-plus-black-select-2016.jpg",'warranty' => "hot", 'accessories' => "rat nhieu", 'condition' => "nat bet", 'promotion' => '50%', 'status' => 0, 'description' => 'May dien thoai xin nhat VN', 'featured' => 0, 'categories_id' => 1],
            ['id' => 9, 'name' => 'Iphone 9', 'code' => 'IP9', 'slug' => 'iphone-9', 'price' => 500000,'image' => "iphone7-plus-black-select-2016.jpg",'warranty' => "hot", 'accessories' => "rat nhieu", 'condition' => "nat bet", 'promotion' => '50%', 'status' => 1, 'description' => 'May dien thoai xin nhat VN', 'featured' => 0, 'categories_id' => 1],
            ['id' => 10, 'name' => 'Iphone 10', 'code' => 'IP10', 'slug' => 'iphone-10','price' => 500000,'image' => "iphone7-plus-black-select-2016.jpg", 'warranty' => "hot", 'accessories' => "rat nhieu", 'condition' => "nat bet", 'promotion' => '50%', 'status' => 0, 'description' => 'May dien thoai xin nhat VN', 'featured' => 1, 'categories_id' => 1],
            ['id' => 11, 'name' => 'Iphone 11', 'code' => 'IP11', 'slug' => 'iphone-11','price' => 500000,'image' => "iphone7-plus-black-select-2016.jpg", 'warranty' => "hot", 'accessories' => "rat nhieu", 'condition' => "nat bet", 'promotion' => '50%', 'status' => 1, 'description' => 'May dien thoai xin nhat VN', 'featured' => 1, 'categories_id' => 1],
            
        ];

        DB::table('products')->delete();
        DB::table('products')->insert($products);
    }
}