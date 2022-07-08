<?php

namespace Database\Seeders;

use App\Models\Suppliers;
use Illuminate\Database\Seeder;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = [
            [
                'trade_name' => 'BODEGA NORTON S.A.',
                'fictitious_name' => 'BODEGA NORTON S.A.',
                'cuit' => '30501657820',
                'phone' => '57778400',
                'address' => 'Arias 3751 Piso 13. C1430 CABA',
            ],
            [
                'trade_name' => 'Francisco Klerman',
                'fictitious_name' => 'Mayorista Klerman S.R.L',
                'cuit' => '20123467895',
                'phone' => '43702342',
                'address' => 'Libertador 1234. CABA',
            ],
            [
                'trade_name' => 'Francisco Martín Juarez',
                'fictitious_name' => 'Distribuidora San Martín',
                'cuit' => '20203450972',
                'phone' => '1587654305',
                'address' => 'Ruta 8 Km.45. San Martín',
            ],
        ];
        foreach ($suppliers as $supplier)
        {
            Suppliers::create($supplier);
        }
        
    }
}
