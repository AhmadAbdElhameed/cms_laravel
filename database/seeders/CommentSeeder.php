<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments    = [];
        $users = collect(User::where('id','>',2)->get()->modelKeys());
        $posts = collect(Post::wherePostType('post')->whereStatus(1)->whereCommentAble(1)->get());

//        for($i = 0; $i < 1000 ; $i++){
//            $comment = Comment::create([
//                'name'=> fake()->name(),
//                'email'=> fake()->safeEmail(),
//                'url'=> fake()->url(),
//                'ip_address'=> fake()->ipv4(),
//                'comment'=> fake()->paragraph(2,true),
//                'status'=> rand(0,1),
//                'post_id'=> fake()->randomDigit(),
//                'user_id'=> fake()->randomDigit(),
//                ]);
//        }


        for($i = 0 ; $i < 2000; $i++) {

            $selected_post = $posts->random();
            $post_date = $selected_post->created_at->timestamp;
            $current_date = Carbon::now()->timestamp;

            $comments[] = [
                'name' => fake()->name(),
                'email' => fake()->safeEmail(),
                'url' => fake()->url(),
                'ip_address' => fake()->ipv4(),
                'comment' => fake()->paragraph(2, true),
                'status' => rand(0, 1),
                'post_id' => $selected_post->id,
                'user_id' => $users->random(),
                'created_at' => date('Y-m-d H:i:s', rand($post_date, $current_date)),
                'updated_at' => date('Y-m-d H:i:s', rand($post_date, $current_date)),
            ];

        }


        $chunks = array_chunk($comments, 200);
        foreach ($chunks as $chunk) {
            Comment::insert($chunk);
        }
    }
}
