<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect(Category::all()->modelKeys());
        $user = collect(User::where('id','>',2)->get()->modelKeys());



        for($i=0 ; $i < 1000 ; $i++){
            $post = Post::create([
                'title' =>fake()->sentence(mt_rand(3,10),true),
                'description' => fake()->paragraph(),
                'status' => rand(0,1),
                'comment_able' => rand(0,1),
                'user_id' => $user->random(),
                'category_id' =>$categories->random(),
            ]);
        }
    }
}
