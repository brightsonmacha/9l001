<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //define Post
            'title' => $this->faker->unique()->sentence(),
            'body' => $this->faker->text(),
            'image_path' => $this->faker->imageUrl()
        ];
    }
}
