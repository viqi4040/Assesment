<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HouseholdMember;

class HouseholdMemberSeeder extends Seeder {
    public function run() {
        HouseholdMember::create([
            'member_name' => 'Lahore House Member',
            'member_age' => 35,
            'marital_status' => 'Married',
            'household_id' => 1
        ]); 
		HouseholdMember::create([
            'member_name' => 'Peshawar House Member',
            'member_age' => 35,
            'marital_status' => 'Married',
            'household_id' => 1
        ]); 
		HouseholdMember::create([
            'member_name' => 'Karachi House Member',
            'member_age' => 35,
            'marital_status' => 'Married',
            'household_id' => 1
        ]); 
    }
}