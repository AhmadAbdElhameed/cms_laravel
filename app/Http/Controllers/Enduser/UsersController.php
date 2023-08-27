<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
        $categories = Category::whereStatus(1)->pluck('name','id');
        return view('enduser.users.create_post',compact('categories'));
    }
    public function storePost(){

    }

}
