<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'category_id' => Category::factory()->create(),
            'body' => $this->faker->text,
            'seo_title' => $this->faker->word,
            'seo_description' => $this->faker->word,
            'seo_keywords' => $this->faker->word,
            'state' => $this->faker->randomElement(['draft', 'published', 'archive']),
        ];
    }
}
