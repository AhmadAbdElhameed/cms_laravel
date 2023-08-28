<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enduser\StorePostRequest;
use App\Http\Requests\Enduser\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Intervention\Image\Image;
use Stevebauman\Purify\Facades\Purify;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $posts = auth()->user()->posts()->with([
            'media','category','user'
        ])->withCount('comments')->orderBy('id','desc')->paginate(15);

        return view('enduser.users.dashboard',compact('posts'));
    }

    public function createPost(){
        $categories = Category::whereStatus(1)->get(['name','id']);
        return view('enduser.users.create_post',compact('categories'));
    }
    public function storePost(StorePostRequest $request){

//        dd($request->all());
        $post = Post::create([
            'title' => $request->title,
            'description' => Purify::clean($request->description),
            'status' =>$request->status,
            'comment_able' =>$request->comment_able,
            'category_id' =>$request->category_id,
            'user_id' => auth()->user()->id,
        ]);
        if($request->images && count($request->images) > 0){
            $i = 1;
            foreach($request->images as $file){
                $filename = $post->slug.'-'.time().'-'.$i.'.'.$file->getClientOriginalExtension();
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $path = public_path('assets/posts/'.$filename);
                \Intervention\Image\Facades\Image::make($file->getRealPath())->
                resize(800,null, function ($constrained){
                    $constrained->aspectRatio();
                })->save($path,100);

                $post->media()->create([
                    'file_name' => $filename,
                    'file_size' => $file_size,
                    'file_type' => $file_type
                ]);
                $i++;
            }
        }

        if($request->status == 1){
            Cache::forget('recent_posts');
        }
        toast('Post Created Successfully','success');

        return redirect(route('enduser.dashboard'));
    }

    public function editPost(Post $post){
        $categories = Category::whereStatus(1)->get(['name','id']);
        return view('enduser.users.edit_post',compact('categories','post'));
    }
    public function updatePost(Post $post , UpdatePostRequest $request){
        $post->update([
            'title' => $request->title,
            'description' => Purify::clean($request->description),
            'status' =>$request->status,
            'comment_able' =>$request->comment_able,
            'category_id' =>$request->category_id,
            'user_id' => auth()->user()->id,
        ]);

        if($request->images && count($request->images) > 0){
            $i = 1;
            foreach($request->images as $file){
                $filename = $post->slug.'-'.time().'-'.$i.'.'.$file->getClientOriginalExtension();
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $path = public_path('assets/posts/'.$filename);
                \Intervention\Image\Facades\Image::make($file->getRealPath())->
                resize(800,null, function ($constrained){
                    $constrained->aspectRatio();
                })->save($path,100);

                $post->media()->create([
                    'file_name' => $filename,
                    'file_size' => $file_size,
                    'file_type' => $file_type
                ]);
                $i++;
            }
        }

        if($request->status == 1){
            Cache::forget('recent_posts');
        }
        toast('Post updated Successfully','success');

        return redirect(route('enduser.dashboard'));

    }
    public function deletePost(Post $post){
        if($post){
            if ($post->media->count() > 0){
                foreach ($post->media as $media){
                    if (File::exists('assets/posts/'.$media->file_name)){
                        unlink('assets/posts/'.$media->file_name);
                    }
                }
            }
            $post->delete();
        }

        toast('Post Deleted Successfully!','success');
        return redirect(route('enduser.dashboard'));
    }

    public function deletePostMedia(PostMedia $media){
        if ($media){
            if (File::exists('assets/posts/'.$media->file_name)){
                unlink('assets/posts/'.$media->file_name);
            }
            $media->delete();
            return true;
        }
        return false;


    }





}
