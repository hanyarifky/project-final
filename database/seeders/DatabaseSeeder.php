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
            'email' => 'rifkydoang2014@gmail.com',
            'nomor_telepon' => "088212461825",
            'role' => 'admin',
            'password' => bcrypt('123'),
        ]);
        User::create([
            'nama' => "Keyla Anggita Putri",
            'username' => 'keyla',
            'email' => 'keyla@gmail.com',
            'nomor_telepon' => "081288138363",
            'role' => 'staff',
            'password' => bcrypt('123'),
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Penduduk::factory(5)->create();
        // Penduduk::create([
        //     nik
        // ]);
        KartuKeluarga::factory(2)->create();
    }
}
