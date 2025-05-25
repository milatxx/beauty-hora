<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Service::insert([
            [
                'name' => 'Knippen',
                'description' => 'Professionele knipbeurt',
                'price' => 25.00,
                'duration' => 30, 
            ],
            [
                'name' => 'Kleuren',
                'description' => 'Haar kleuren op maat',
                'price' => 45.00,
                'duration' => 60,
            ],
            [
                'name' => 'Styling',
                'description' => 'Feestkapsels en meer',
                'price' => 35.00,
                'duration' => 40,
            ],
        ]);
           
           
    }
}
