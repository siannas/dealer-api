<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Motor;
use App\Enums\TipeKendaraan;

class MotorFactory extends Factory
{
    protected $model = Motor::class;

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
            'harga' =>  $this->faker->randomNumber(8, true),
            'mesin' =>  $this->faker->randomElement(['DOHC', 'SOHC', 'OHV']),
            'tipe suspensi' =>  $this->faker->randomElement(['Swing Arm Rear Suspension', 'Pararel Fork', 'Plunger Rear Suspension', 'Telescopic Fork', 'Telescopic Up Side Down']),
            'tipe transmisi' =>  $this->faker->randomElement(['Manual', 'DCT', 'CVT']),
            'tipe kendaraan' =>  TipeKendaraan::MOTOR
        ];
    }
}
