<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(250)->create()->each(function(Product $Product){
            Image::factory(4)->create(([
                'imageable_id'=>$Product->id,
                'imageable_type'=>Product::class
            ]));
            // $Product->valuesitems()->attach([
            //     rand(1,4),
            //         rand(5,8),
            //         rand(6,10),
            //         rand(11,13),
            //         rand(14,17),
            //         rand(18,19)

            // ]);
        });
    }
}
