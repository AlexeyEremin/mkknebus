<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(BuildingSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(OrganizationActivitySeeder::class);
    }
}
