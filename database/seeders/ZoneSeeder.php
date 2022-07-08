<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zones = [
            ['name' => 'Zona 1', 'shipping_cost' => 300.00 , 'shipping_time' => 12],
            ['name' => 'Zona 2', 'shipping_cost' => 500.00 , 'shipping_time' => 24],
            ['name' => 'Zona 3', 'shipping_cost' => 900.00 , 'shipping_time' => 24],
            ['name' => 'Zona 4'],            
        ];
        foreach ($zones as $zone)
        {
            Zone::create($zone);
        }
    }
}
