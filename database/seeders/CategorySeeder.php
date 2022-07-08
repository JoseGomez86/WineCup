<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Almacen',
                'slug' => Str::slug('Almacen'),
                'icon' => '</i><i class="fas fa-store"></i>'
            ],
            [
                'name' => 'Bebidas',
                'slug' => Str::slug('Bebidas'),
                'icon' => '<i class="fas fa-wine-bottle"></i>'
            ],
            [
                'name' => 'Textil',
                'slug' => Str::slug('Textil'),
                'icon' => '<i class="fas fa-tshirt"></i>'
            ],
            [
                'name' => 'Dormitorio',
                'slug' => Str::slug('Dormitorio'),
                'icon' => '<i class="fas fa-bed"></i>'
            ],
            [
                'name' => 'Bazar',
                'slug' => Str::slug('Bazar'),
                'icon' => '<i class="fas fa-wine-glass"></i>'
            ],
        ];
        foreach ($categories as $category)
        {
            Category::factory(1)->create($category);
        }
    }
}
