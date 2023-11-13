<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder {
    public function run() {
        Province::create(['name' => 'Punjab']);
        Province::create(['name' => 'KPK']);
        Province::create(['name' => 'Sindh']);
    }
}
