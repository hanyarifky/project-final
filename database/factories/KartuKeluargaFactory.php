<?php

namespace Database\Factories;

use App\Models\KartuKeluarga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KartuKeluarga>
 */
class KartuKeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = KartuKeluarga::class;

    public function definition()
    {
        return [
            'nomor_kartu_keluarga' => $this->faker->unique()->numerify('###-###-###'),
            'nama_kepala_keluarga' => $this->faker->firstName . ' ' . $this->faker->lastName(),
            'rt' => $this->faker->randomElement(['001', '002', '003']),
            'rw' => $this->faker->randomElement(['001', '002', '003']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
