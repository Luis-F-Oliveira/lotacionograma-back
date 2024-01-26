<?php

namespace Database\Seeders;

use App\Models\Staffing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staffing::factory()->count(5)->create();
    }
}
