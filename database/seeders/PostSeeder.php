<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Can be used for startup data
        $posts = [
            [
                'title' => 'Post One',
                'body' => 'Body One'
            ],
            [
                'title' => 'Post Two',
                'body' => 'Body Two'
            ]
        ];

        foreach ($posts as $key => $value) {
            Post::create($value);
        }
    }
}


