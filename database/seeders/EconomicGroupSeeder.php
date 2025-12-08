<?php

namespace Database\Seeders;

use App\Models\EconomicGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EconomicGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EconomicGroup::factory(15)->create();
    }
}
