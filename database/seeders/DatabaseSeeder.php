<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            MarketingBannerSeeder::class,
            CategorySeeder::class,
            PromotionSeeder::class,
            BookSeeder::class,
            InvoiceSeeder::class,
            InvoiceItemSeeder::class,
            BrandSeeder::class,
            ReviewSeeder::class
        ]);
    }
}
