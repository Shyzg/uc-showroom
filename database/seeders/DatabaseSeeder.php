<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => 3578101010100001,
            'name' => 'Irawan',
            'address' => 'Jl. Raya Bogor KM 30',
            'phone' => '081234567890',
        ]);

        User::create([
            'id' => 3578101010100002,
            'name' => 'Rico Rudikan',
            'address' => 'Jl. Raya Darmo Permai Selatan',
            'phone' => '081298765432',
        ]);

        User::create([
            'id' => 3578101010100003,
            'name' => 'Anathan Pham',
            'address' => '123 Fake Street',
            'phone' => '081298762345',
        ]);
    }
}
