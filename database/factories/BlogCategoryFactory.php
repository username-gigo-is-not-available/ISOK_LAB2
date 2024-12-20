<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\SlugGenerator;

class BlogCategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()->word();

        return [
            'id' => $this->faker->uuid(),
            'name' => $name,
            'slug' => SlugGenerator::slugify($name),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
