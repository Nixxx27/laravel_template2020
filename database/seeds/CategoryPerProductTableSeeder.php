<?php

use Illuminate\Database\Seeder;

class CategoryPerProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_per_product')->delete();
        
        DB::table('category_per_product')->insert(array (
            [
                'product_id' => 1,
                'productcategory_id' => 2,
                'created_at' => '2020-08-10 22:04:34',
                'updated_at' => '2020-08-04 22:04:35',
                'deleted_at' => NULL,
            ],
            [
                'product_id' => 2,
                'productcategory_id' => 3,
                'created_at' => '2020-08-10 22:04:34',
                'updated_at' => '2020-08-04 22:04:35',
                'deleted_at' => NULL,
            ],
            [
                'product_id' => 3,
                'productcategory_id' => 1,
                'created_at' => '2020-08-10 22:04:34',
                'updated_at' => '2020-08-04 22:04:35',
                'deleted_at' => NULL,
            ]
        ));
    }
}
