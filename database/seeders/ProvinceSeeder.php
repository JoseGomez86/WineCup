<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [    
            ['name' => 'Buenos Aires'],
            ['name' => 'Capital Federal'],
            ['name' => 'Catamarca'],
            ['name' => 'Chaco'],
            ['name' => 'Chubut'],
            ['name' => 'Córdoba'],
            ['name' => 'Corrientes'],
            ['name' => 'Entre Ríos'],
            ['name' => 'Formosa'],
            ['name' => 'Jujuy'],
            ['name' => 'La Pampa'],
            ['name' => 'La Rioja'],
            ['name' => 'Mendoza'],
            ['name' => 'Misiones'],
            ['name' => 'Neuquén'],
            ['name' => 'Río Negro'],
            ['name' => 'Salta'],
            ['name' => 'San Juan'],
            ['name' => 'San Luis'],
            ['name' => 'Santa Cruz'],
            ['name' => 'Santa Fe'],
            ['name' => 'Santiago del Estero'],
            ['name' => 'Tierra del Fuego'],
            ['name' => 'Tucumán'],           
        ];
        foreach ($provinces as $province)
        {
            Province::create($province);
        }
    }
}
