<?php

namespace Database\Factories;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\SlugGenerator;
use App\Models\BlogCategory;

class BlogFactory extends Factory
{
    public function title()
    {
        $sentence = $this->faker->sentence($this->faker->numberBetween(2, 5));
        return substr($sentence, 0, strlen($sentence) - 1);
    }

    public function definition(): array
    {
        $title = $this->title();

        $category = BlogCategory::first();



        return [
            'id' => $this->faker->uuid(),
            'title' => $title,
            'slug' => SlugGenerator::slugify($title),
            'content' => $this->faker->text(),
            'blog_category_id' => $category->id,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
