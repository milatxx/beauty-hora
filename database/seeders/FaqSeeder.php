<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        FaqCategory::factory(3)->create()->each(function ($category) {
            Faq::factory(4)->create([
                'faq_category_id' => $category->id,
            ]);
        });
    }
}
