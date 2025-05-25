<?php

namespace Database\Factories;

use App\Models\FaqCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqCategoryFactory extends Factory
{
    protected $model = FaqCategory::class;

    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->word),
        ];
    }
}
