<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Role::class;
    
    public function definition()
    {
        return [
            'name' => Str::random(20),
            'nature' => Str::random(10),
            'nature' => Str::random(10),
            'existing' => $this->faker->numberBetween(0, 255),
            'busy' => $this->faker->numberBetween(0, 255),
            'empty' => $this->faker->numberBetween(0, 255),
            'category_id' => function () {
                return Category::pluck('id')->random();
            }
        ];
    }
}
