<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


            Post::create([
                'title' => 'About Us',
                'description' => fake()->paragraph(),
                'status' => 1,
                'comment_able' => 0,
                'post_type' => 'page',
                'user_id' => 1,
                'category_id' => 1,
            ]);

            Post::create([
                'title' => 'Our Vision',
                'description' => fake()->paragraph(),
                'status' => 1,
                'comment_able' => 0,
                'post_type' => 'page',
                'user_id' => 1,
                'category_id' => 1,
            ]);

    }
}
