<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();
        
        DB::table('product')->insert(array (
            [
                'title' => 'Tropical Print Satin Pajama Set',
                'content' => '&nbsp;<br />
                Style: Elegant<br />
                Color: Coral Pink<br />
                Pattern Type: Animal, Tropical<br />
                Neckline: Notched, Spaghetti Strap<br />
                Type: Pant Sets, Short Sets<br />
                Details: Button, Pocket<br />
                Sleeve Length: Long Sleeve<br />
                Composition: 100% Polyester<br />
                Material: Satin<br />
                Fabric: Non-stretch<br />
                Sheer: No<br />
                &nbsp;<br />
                &nbsp;',
                'image' => NULL,
                'created_at' => '2020-08-10 22:04:34',
                'updated_at' => '2020-08-04 22:04:35',
                'deleted_at' => NULL,
            ],
            [
                'title' => 'Fleur Jewelry',
                'content' => '- Cubic Zirconia embellished ring<br />
                - Stainless steel<br />
                - Moon and star design<br />
                - Adjustable size',
                'image' => NULL,
                'created_at' => '2020-08-10 22:04:34',
                'updated_at' => '2020-08-04 22:04:35',
                'deleted_at' => NULL,
            ],
            [
                'title' => 'HP EliteBook 840 G3 Notebook PC',
                'content' => '<p>Multicore is designed to improve performance of certain software products. Not all customers or software applications necessarily benefit from use of this technology. Performance and clock frequency vary depending on application workload and hardware and software configurations. Intel numbering is not a measurement of higher performance.</p>',
                'image' => NULL,
                'created_at' => '2020-08-10 22:04:34',
                'updated_at' => '2020-08-04 22:04:35',
                'deleted_at' => NULL,
            ]
        ));
    }
}
