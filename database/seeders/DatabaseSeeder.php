<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;  // vergeet dit niet als je User::factory gebruikt
// gebruik hier ook je DefaultAdminSeeder
use Database\Seeders\DefaultAdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Eerst de default admin
        $this->call(DefaultAdminSeeder::class);

        // (optioneel) dan een test-user via factory
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('secret123'), // of Hash::make()
        ]);
    }
}
