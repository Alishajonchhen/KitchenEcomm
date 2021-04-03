<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productRecords = [
            [
                'id' => 1, 'product_name' => 'Stainless Oven', 'product_price' => '15000', 'product_discount' => '1500',
                'product_description' => 'Test Product', 'product_voltage' => '250', 'product_color' => 'Black',
                'product_image' => '111121312', 'category_id' => '1', 'status' => 1
            ],

            [
                'id' => 2, 'product_name' => 'Oven Forge', 'product_price' => '19000', 'product_discount' => '2000',
                'product_description' => 'Test Product', 'product_voltage' => '200', 'product_color' => 'Grey',
                'product_image' => '1112312312', 'category_id' => '1', 'status' => 1
            ]
        ];

        Product::insert($productRecords);
    }
}
