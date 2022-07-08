<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'id'    => 1,
                'name'  => 'Orden de compra',
                'color' => 'bg-indigo-500',
                'icon'  => '<i class="fas fa-cart-arrow-down"></i>'
            ],
            [
                'id'    => 2,
                'name'  => 'Pago realizado',
                'color' => 'bg-orange-500',
                'icon'  => '<i class="fas fa-money-check-alt"></i>'
            ],
            [
                'id'    => 3,
                'name'  => 'En proceso',
                'color' => 'bg-yellow-300',
                'icon'  => '<i class="fas fa-truck-loading"></i>'
            ],
            [
                'id'    => 4,
                'name'  => 'En camino',
                'color' => 'bg-blue-500',
                'icon'  => '<i class="fas fa-truck"></i>'
            ],
            [
                'id'    => 5,
                'name'  => 'Entregado',
                'color' => 'bg-green-500',
                'icon'  => '<i class="fas fa-check-circle"></i>'
            ],
            [
                'id'    => 6,
                'name'  => 'Anulado',
                'color' => 'bg-gray-700',
                'icon'  => '<i class="fas fa-times-circle"></i>'
            ],
            [
                'id'    => 7,
                'name'  => 'Pago pend. aprobar',
                'color' => 'bg-red-400',
                'icon'  => '<i class="fas fa-money-check-alt"></i>'
            ],
        ];
        foreach ($statuses as $status)
        {
            Status::create($status);
        }
    }
}
