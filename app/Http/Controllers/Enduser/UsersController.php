<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('enduser.users.dashboard');
    }
}
