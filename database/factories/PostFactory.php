<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{
    
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
