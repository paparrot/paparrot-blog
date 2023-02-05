<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
            'body' => $this->faker->text,
            'preview' => $this->faker->word,
            'seo_title' => $this->faker->word,
            'seo_description' => $this->faker->word,
            'seo_keywords' => $this->faker->word,
            'state' => $this->faker->word,
        ];
    }
}
