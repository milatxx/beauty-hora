<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\News;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\Faq;
use App\Models\FaqCategory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call extra seeders als je die hebt
        $this->call([
            DefaultAdminSeeder::class,
            FaqSeeder::class,
            NewsSeeder::class,
            ServiceSeeder::class,
            SpecializationSeeder::class,
        ]);

        // Test user
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('secret123'),
            ]
        );

        // Factories
        News::factory(10)->create();
        Service::factory(5)->create();
        Specialization::factory(5)->create();
        FaqCategory::factory(3)->create();
        Faq::factory(10)->create();
    }
}
