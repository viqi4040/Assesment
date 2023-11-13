<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictsSeeder extends Seeder {
    public function run() {
        District::create(['name' => 'Lahore District', 'division_id' => 1]);
        District::create(['name' => 'Peshawar District', 'division_id' => 2]);
		District::create(['name' => 'Karachi District', 'division_id' => 3]);
}
}