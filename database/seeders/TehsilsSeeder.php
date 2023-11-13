<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tehsil;

class TehsilsSeeder extends Seeder {
    public function run() {
        Tehsil::create(['name' => 'Lahore Tehsil', 'district_id' => 1]); 
        Tehsil::create(['name' => 'Peshawar Tehsil', 'district_id' => 2]);
		Tehsil::create(['name' => 'Karachi Tehsil', 'district_id' => 3]);
    }
}
