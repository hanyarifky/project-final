<?php

namespace Database\Seeders;

use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => "Muhammad Rifky Ramadhani",
            'username' => 'rifky123',
            'password' => bcrypt('123'),
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Penduduk::factory(2)->create();
        // Penduduk::create([
        //     nik
        // ]);
        KartuKeluarga::factory(2)->create();
    }
}
