<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mobil;
use App\Enums\TipeKendaraan;

class MobilFactory extends Factory
{
    protected $model = Mobil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'terjual' =>  $this->faker->dateTimeThisMonth('+4 weeks'),
            'tahun keluaran' =>  $this->faker->numberBetween(1999, 2022),
            'warna' =>  $this->faker->safeColorName(),
            'harga' =>  $this->faker->randomNumber(9, true),
            'mesin' =>  $this->faker->randomElement(['Two Stroke', 'Four Stroke', 'Six Stroke']),
            "kapasitas penumpang" => $this->faker->numberBetween(2, 8),
            "tipe" => $this->faker->randomElement(['SUV', 'MPV', 'Hatchback', 'Crossover', 'Sedan', 'LCGC', 'Off-Road']),
            'tipe kendaraan' =>  TipeKendaraan::MOBIL
        ];
    }
}
