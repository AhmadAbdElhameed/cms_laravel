<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enduser\ContactRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $contactModel;
    public function __construct(Contact $contact)
    {
        $this->contactModel = $contact;
    }

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
        $post = $post
            ->where('status',1)
            ->first();

        if($post){
            $blade = $post->post_type == 'post' ? 'post' : 'page';
            return view('enduser.'.$blade,compact('post'));
        }else{
            return redirect(route('index'));
        }
    }

    public function commentStore(StoreCommentRequest $request , $slug){
//        dd($request->all(),$slug);
        $post = Post::where('slug',$slug)
            ->where('post_type','post')
            ->where('status',1)->first();

        if($post){
            $userId = auth()->check() ? auth()->id() : null;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['url'] = $request->url;
            $data['ip_address'] = $request->ip();
            $data['comment'] = $request->comment;
            $data['post_id'] = $post->id;
            $data['user_id'] = $userId;

            $post->comments()->create($data);
//            Comment::create($data);

            toast("Comment added successfully", 'success');
            return redirect()->back();
        }

        return redirect()->back();

    }

    public function contact(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('enduser.contact');
    }
    public function send_message(ContactRequest $request){

        $this->contactModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'title' => $request->title,
            'message' => $request->message,
        ]);

        toast('Message Sent Successfully !','success');
        return redirect(route('contact'));
    }
}
