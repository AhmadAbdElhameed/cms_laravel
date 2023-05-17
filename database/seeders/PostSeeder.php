<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts =[];
        $categories = collect(Category::all()->modelKeys());
        $user = collect(User::where('id','>',2)->get()->modelKeys());



        for($i=0 ; $i < 2000 ; $i++){
            $days = ['01','02','03','04','05','06','07','08','09','10','11','12','13','14','15'];
            $months = ['01','02','03','04'];
            $post_date = '2022-' . Arr::random($months). '-' . Arr::random($days) . " 01:01:01";
            $post_title = fake()->sentence(mt_rand(3,10),true);

            $posts[] = [
                'title' =>$post_title,
                'slug' =>Str::slug($post_title),
                'description' => fake()->paragraph(),
                'status' => rand(0,1),
                'comment_able' => rand(0,1),
                'user_id' => $user->random(),
                'category_id' =>$categories->random(),
                'created_at' => $post_date,
                'updated_at' => $post_date
            ];
        }

        $chunks = array_chunk($posts, 200);
        foreach ($chunks as $chunk){
            Post::insert($chunk);
        }

    }
}
