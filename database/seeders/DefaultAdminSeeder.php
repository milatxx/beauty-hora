<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultAdminSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name'     => 'admin',
                'email'    => 'admin@ehb.be',
                'password' => Hash::make('Password!321'),
                'is_admin' => true, // als je een kolom 'is_admin' hebt
            ]
        );
    }
}
