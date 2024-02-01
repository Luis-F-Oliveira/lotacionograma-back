<?php

namespace Database\Factories;

use App\Models\Staffing;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Area>
 */
class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => Str::random(10),
            'staffing_id' => function () {
                return Staffing::pluck('id')->random();
            },
            'type' => $this->faker->unique()->randomElement([1, 2])
        ];
    }
}
