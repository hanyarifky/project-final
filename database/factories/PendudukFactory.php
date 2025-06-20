<?php

namespace Database\Factories;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class PendudukFactory extends Factory
{
    protected $model = Penduduk::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->firstName . ' ' . $this->faker->lastName(),
            'nik' => '36' . $this->faker->numerify('##############'), // NIK diawali dengan 36 dan diikuti 10 digit acak
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->address(),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Budha', 'Katholik', 'Konghucu']),
            'status_perkawinan' => $this->faker->randomElement(['belum kawin', 'kawin']),
            'pekerjaan' => $this->faker->randomElement([
                'Wiraswasta',
                'PNS',
                'Mahasiswa',
                'Karyawan Swasta',
                'Petani',
                'Pedagang',
                'Guru',
                'Dokter',
                'Buruh'
            ]),

        ];
    }
}
