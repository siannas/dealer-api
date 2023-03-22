<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Motor;
use App\Models\Mobil;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->make([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ])->save();

        Motor::factory()->count(39)->create();
        Mobil::factory()->count(27)->create();

        Motor::factory()->count(7)->create([
            'terjual' => null
        ]);

        Mobil::factory()->count(3)->create([
            'terjual' => null
        ]);
    }
}
