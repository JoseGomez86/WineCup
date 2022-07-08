<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            //Almacen
            [
                'category_id' => 1,
                'name' => 'Pastas',
                'slug' => Str::slug('Pastas'),
            ],
            [
                'category_id' => 1,
                'name' => 'Azucar',
                'slug' => Str::slug('Azucar'),
            ],
            [
                'category_id' => 1,
                'name' => 'Aceite',
                'slug' => Str::slug('Aceite'),
            ],
            [
                'category_id' => 1,
                'name' => 'Yerba',
                'slug' => Str::slug('Yerba'),
            ],
            [
                'category_id' => 1,
                'name' => 'Té',
                'slug' => Str::slug('Té'),
            ],
            [
                'category_id' => 1,
                'name' => 'Café',
                'slug' => Str::slug('Café'),
            ],
            [
                'category_id' => 1,
                'name' => 'Latas',
                'slug' => Str::slug('Latas'),
            ],
            [
                'category_id' => 1,
                'name' => 'Salsas',
                'slug' => Str::slug('Salsas'),
            ],

            //Bebidas
            [
                'category_id' => 2,
                'name' => 'Vinos',
                'slug' => Str::slug('Vinos'),
            ],
            [
                'category_id' => 2,
                'name' => 'Cervezas',
                'slug' => Str::slug('Cervezas'),
            ],
            [
                'category_id' => 2,
                'name' => 'Whiskies',
                'slug' => Str::slug('Whiskies'),
            ],
            [
                'category_id' => 2,
                'name' => 'Gaseosas',
                'slug' => Str::slug('Gaseosas'),
            ],
            [
                'category_id' => 2,
                'name' => 'Aguas',
                'slug' => Str::slug('Aguas'),
            ],
            [
                'category_id' => 2,
                'name' => 'Jugos',
                'slug' => Str::slug('Jugos'),
            ],

            //Textil
            [
                'category_id' => 3,
                'name' => 'Toallones',
                'slug' => Str::slug('Toallones'),
            ],
            [
                'category_id' => 3,
                'name' => 'Cortinas',
                'slug' => Str::slug('Cortinas'),
            ],

            //Dormitorio
            [
                'category_id' => 4,
                'name' => 'Sabanas',
                'slug' => Str::slug('Sabanas'),
            ],
            [
                'category_id' => 4,
                'name' => 'Acolchados',
                'slug' => Str::slug('Acolchados'),
            ],
            [
                'category_id' => 4,
                'name' => 'Colchones',
                'slug' => Str::slug('Colchones'),
            ],
            [
                'category_id' => 4,
                'name' => 'Almohadas',
                'slug' => Str::slug('Almohadas'),
            ],

            //Bazar
            [
                'category_id' => 5,
                'name' => 'Vasos',
                'slug' => Str::slug('Vasos'),
            ],
            [
                'category_id' => 5,
                'name' => 'Copas',
                'slug' => Str::slug('Copas'),
            ],  
            [          
                'category_id' => 5,
                'name' => 'Termos',
                'slug' => Str::slug('Termos'),
            ],
            [
                'category_id' => 5,
                'name' => 'Platos',
                'slug' => Str::slug('Platos'),
            ],

        ];
        foreach ($subcategories as $subcategory)
        {
            Subcategory::factory(1)->create($subcategory);//->each(function(Subcategory $subcategory){
            //     $subcategory->valuesitems()->attach([
            //         rand(1,4),
            //         rand(5,8),
            //         rand(6,10),
            //         rand(11,13),
            //         rand(14,17),
            //         rand(18,19)
            //     ]);
            // });            
        }
    }
}
