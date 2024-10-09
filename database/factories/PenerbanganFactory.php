<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penerbangan>
 */
class PenerbanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jadwal_berangkat = fake()->dateTimeBetween("now", "+30 days");

        $jadwal_kedatangan = (clone $jadwal_berangkat)->modify("+" . rand(1,5) . " hours");;

        return [
            "no_penerbangan" => fake()->unique()->bothify('??###'),
            "jadwal_berangkat" => $jadwal_berangkat->format("Y-m-d H:i:s"),
            "jadwal_kedatangan" => $jadwal_kedatangan->format("Y-m-d H:i:s"),
            "harga" => fake()->numberBetween(1000000, 5000000 ),
            "kapasitas" => fake()->numberBetween(100,200),
            "maskapai_id" => fake()->numberBetween(1,5)
        ];
    }
}
