<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staffing>
 */
class StaffingFactory extends Factory
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
            'role_id' => function () {
                return Role::pluck('id')->random();
            },
            'department_id' => function () {
                return Department::pluck('id')->random();
            }
        ];
    }
}
