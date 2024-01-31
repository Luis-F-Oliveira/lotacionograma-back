<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Access;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::pluck('id')->random();
            },
            'password' => Hash::make(12345678),
            'access' => function () {
                return Access::pluck('id')->random();
            },
            'theme' => false,
            'first' => false
        ];
    }
}
