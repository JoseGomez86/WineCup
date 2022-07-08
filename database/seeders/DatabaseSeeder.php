<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Storage::deleteDirectory('categories');
        Storage::makeDirectory('categories');
        Storage::deleteDirectory('subcategories');
        Storage::makeDirectory('subcategories');
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        $this->call(SuppliersSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(ValuesitemSeeder::class);
        $this->call(StatusproductSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(LocalitySeeder::class);
        $this->call(ZoneSeeder::class);
        $this->call(PostcodeSeeder::class);        
    }
}
