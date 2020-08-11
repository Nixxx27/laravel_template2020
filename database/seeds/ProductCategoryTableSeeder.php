<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_category')->delete();
        
        DB::table('product_category')->insert(array (
            [
                'title' => 'Electronic Device',
                'created_at' => '2020-08-10 22:04:34',
                'updated_at' => '2020-08-04 22:04:35',
                'deleted_at' => NULL,
            ],
            [
                'title' => 'Womens',
                'created_at' => '2020-08-10 22:04:34',
                'updated_at' => '2020-08-04 22:04:35',
                'deleted_at' => NULL,
            ],
            [
                'title' => 'Accessories',
                'created_at' => '2020-08-10 22:04:34',
                'updated_at' => '2020-08-04 22:04:35',
                'deleted_at' => NULL,
            ]
        ));
    }
}
