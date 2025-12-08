<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EconomicGroupSeeder::class,
            FlagSeeder::class,
            UnitSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class,
        ]);
    }
}
