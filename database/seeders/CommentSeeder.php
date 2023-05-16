<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = collect(User::where('id','>',2)->get()->modelKeys());

        $posts = collect(Post::wherePostType('post')->whereStatus(1)->whereCommentAble(1)->get());

        for($i = 0; $i < 100 ; $i++){
            $comment = Comment::create([
                'name'=> fake()->name(),
                'email'=> fake()->safeEmail(),
                'url'=> fake()->url(),
                'ip_address'=> fake()->ipv4(),
                'comment'=> fake()->paragraph(2,true),
                'status'=> rand(0,1),
                'post_id'=> $posts->random()->id,
                'user_id'=> $users->random()->id,
                ]);
        }
    }
}
