<?php

namespace Database\Seeders;

use App\Models\MarketingBanner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MarketingBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MarketingBanner::factory()->count(3)->create();
    }
}
