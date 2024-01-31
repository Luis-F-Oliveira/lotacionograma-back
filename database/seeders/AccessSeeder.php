<?php

namespace Database\Seeders;

use App\Models\Access;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Access::factory()->count(4)->create();
    }
}
