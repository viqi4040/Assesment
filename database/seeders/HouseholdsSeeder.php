<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Household;

class HouseholdsSeeder extends Seeder {
    public function run() {
        Household::create([
            'member_name' => 'Lahore Member',
            'address' => '123 Street Name',
            'street' => 'Main Street',
            'house_no' => '1A',
            'union_council_id' => 1
        ]); 
		Household::create([
            'member_name' => 'Peshawar Member',
            'address' => '123 Street Name',
            'street' => 'Main Street',
            'house_no' => '1A',
            'union_council_id' => 2
        ]);
		Household::create([
            'member_name' => 'Karachi Member',
            'address' => '123 Street Name',
            'street' => 'Main Street',
            'house_no' => '1A',
            'union_council_id' => 3
        ]);
    }
}