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
            ['id' => 1, 'name' => 'Oven', 'status' => 1, 'slug' => 'oven', 'category_code' => 'OVN'],
            ['id' => 2, 'name' => 'Kettle', 'status' => 1, 'slug' => 'kettle', 'category_code' => 'KET'],
            ['id' => 3, 'name' => 'Vacuum Cleaner', 'status' => 1, 'slug' => 'vacuum-cleaner', 'category_code' => 'VAC'],
            ['id' => 4, 'name' => 'Toaster', 'status' => 1, 'slug' => 'toaster', 'category_code' => 'TOAT'],
            ['id' => 5, 'name' => 'Fan', 'status' => 1, 'slug' => 'fan', 'category_code' => 'FAN'],
            ['id' => 6, 'name' => 'Utensils', 'status' => 1, 'slug' => 'utensils', 'category_code' => 'UTE'],
        ];

        Category::insert($categoryRecords);
    }
}
