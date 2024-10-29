<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kendaraan>
 */
class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kendaraan' => fake()->name(),
            'nopol' => fake()->unique()->randomNumber(6, true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
