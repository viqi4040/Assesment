<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionSeeder extends Seeder {
    public function run() {
        Division::create(['name' => 'Lahore Division', 'province_id' => 1]);
		Division::create(['name' => 'Peshawar Division', 'province_id' => 2]);
        Division::create(['name' => 'Karachi Division', 'province_id' => 3]);
    }
}