<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class FaskesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_ruas_jalans' => fake()->shuffle([1, 2, 3]),
            'id_jenis_faskes' => fake()->shuffle([1, 2, 3]),
            'lat' => fake()->numberBetween($min = -90, $max = 90),
            'lng' => fake()->longitude($min = -180, $max = 180),
            'tipe_jalan' => fake()->word(),
            'lebar_jalan' => fake()->randomNumber(2, true),
            'pengadaan' => fake()->dateTime(),
            'pemeliharaan' => fake()->randomNumber(1, true),
            'foto' => fake()->word() . '.jpg',
            'garansi' => fake()->randomNumber(1, true),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
