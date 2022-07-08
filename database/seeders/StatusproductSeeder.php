<?php

namespace Database\Seeders;

use App\Models\Statusproduct;
use Illuminate\Database\Seeder;

class StatusproductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusproducts = [            
            ['name' => 'Habilitado'],
            ['name' => 'Deshabilitado'],
            ['name' => 'Pausado'],
            ['name' => 'Sin Stock'],
        ];
        foreach ($statusproducts as $statusproduct) {
            Statusproduct::create($statusproduct);
        }
    }
}
