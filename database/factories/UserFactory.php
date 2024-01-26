<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'matriculation' => mt_rand(100000000, 999999999),
            'name' => fake()->name(),
            'birth' => fake()->date(),
            'email' => fake()->unique()->safeEmail(),
            'gender' => Str::random(10),
            'race' => Str::random(10),
            'phone' => mt_rand(100000000000, 999999999999),
            'admission' => fake()->date()
        ];
    }
}
