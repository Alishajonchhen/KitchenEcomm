<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRecords = [
            ['id' => 1, 'name' => 'Oven', 'status' => 1, 'slug' => 'oven', 'category_code' => 'OVN', 'category_image' => 'thumbnail_Kettle_1616358489.jpg'],
            ['id' => 2, 'name' => 'Kettle', 'status' => 1, 'slug' => 'kettle', 'category_code' => 'KET', 'category_image' => 'thumbnail_Kettle_1616358489.jpg'],
            ['id' => 3, 'name' => 'Vacuum Cleaner', 'status' => 1, 'slug' => 'vacuum-cleaner', 'category_code' => 'VAC', 'category_image' => 'thumbnail_Kettle_1616358489.jpg'],
            ['id' => 4, 'name' => 'Toaster', 'status' => 1, 'slug' => 'toaster', 'category_code' => 'TOAT', 'category_image' => 'thumbnail_Kettle_1616358489.jpg'],
            ['id' => 5, 'name' => 'Fan', 'status' => 1, 'slug' => 'fan', 'category_code' => 'FAN', 'category_image' => 'thumbnail_Kettle_1616358489.jpg'],
            ['id' => 6, 'name' => 'Utensils', 'status' => 1, 'slug' => 'utensils', 'category_code' => 'UTE', 'category_image' => 'thumbnail_Kettle_1616358489.jpg'],
        ];

        Category::insert($categoryRecords);
    }
}
