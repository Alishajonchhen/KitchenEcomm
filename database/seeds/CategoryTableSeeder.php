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
            ['id' => 1, 'name' => 'Oven', 'status'=>1],
            ['id' => 2, 'name' => 'Kettle','status'=>1],
            ['id' => 3, 'name' => 'Vacuum Cleaner','status'=>1],
            ['id' => 4, 'name' => 'Toaster','status'=>1],
            ['id' => 5, 'name' => 'Fan','status'=>1],
            ['id' => 6, 'name' => 'Utensils','status'=>1],
        ];

        Category::insert($categoryRecords);
    }
}
