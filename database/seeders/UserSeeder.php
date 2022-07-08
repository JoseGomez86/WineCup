<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'José Gómez',
            'email' => 'josegomez.upe@gmail.com',
            'password' => bcrypt('J-456321'),
            'documentId' => '34567890',
        ])->assignRole('Admin');

        $user1->phones()->create(['numberPhone' => '1155443322']);

    }
}
