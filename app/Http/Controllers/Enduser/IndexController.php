<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $posts = Post::with(['category','user','media'])
            ->whereHas('category',function($query){
                $query->where('status',1);
            })
            ->whereHas('user',function($query){
                $query->where('status',1);
            })
            ->where('post_type','post')
            ->where('status',1)
            ->orderBy('id','desc')->paginate(10);
        return view('enduser.index',compact('posts'));
    }

    public function show($slug){
        $post = Post::with(['category','user','media','approved_comments' => function($query){
            $query->orderBy('id','desc');
        }])->whereHas('category',function($query){
                $query->where('status',1);
        })->whereHas('user',function($query){
                $query->where('status',1);
        });
        $post = $post->where('slug',$slug);
        $post = $post->where('post_type','post')
            ->where('status',1)
            ->first();

        if($post){
            return view('enduser.post',compact('post'));
        }else{
            return redirect(route('index'));
        }
    }
}
