<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph(4),
            'published_at' => $this->faker->date(),
            'image' => null,
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
        ];
    }
}
