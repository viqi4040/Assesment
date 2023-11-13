<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SeedAll extends Command
{
    protected $signature = 'db:seed-all';
    protected $description = 'Seed the database with all seeders';

    public function handle()
    {
        $seeders = [
		
			'ProvinceSeeder',
			'DivisionSeeder',
            'DistrictsSeeder',
			'TehsilsSeeder',
			'UnionCouncilsSeeder',
			'HouseholdsSeeder',
            'HouseholdMemberSeeder',
			'RoleSeeder',
			
			
            // Add more seeders as needed
        ];

        foreach ($seeders as $seeder) {
            $this->call('db:seed', ['--class' => $seeder]);
        }

        $this->info('All seeders have been run.');
    }
}
