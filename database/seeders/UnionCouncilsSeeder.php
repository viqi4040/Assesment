<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UnionCouncil;

class UnionCouncilsSeeder extends Seeder {
    public function run() {
        UnionCouncil::create(['name' => 'Lahore Union Council', 'tehsil_id' => 1]); 
        UnionCouncil::create(['name' => 'Peshawar Union Council', 'tehsil_id' => 2]);
		UnionCouncil::create(['name' => 'Karachi Union Council', 'tehsil_id' => 3]);
    }
}
