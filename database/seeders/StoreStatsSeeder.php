<?php

namespace Database\Seeders;

use App\Models\StoreStats;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreStatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StoreStats::firstOrCreate([
            'id' => 1, // Ensures a single record is used for stats tracking
            'total_candies_sold' => 0,
            'total_revenue' => 0.00,
        ]);
    }
}
