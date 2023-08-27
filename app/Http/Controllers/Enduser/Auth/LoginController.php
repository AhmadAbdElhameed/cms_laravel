<?php

namespace App\Http\Controllers\Enduser\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('enduser.auth.login');
    }

    public function username()
    {
        return 'username';
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->status == 1) {
            $name = $user->name;
            toast('Welcome '.$name,'success');
            return redirect()->route('index');
        }
        $name = $user->name;
        toast($name.' your account is disable please contact our team for more information\'s','warning');
        return redirect()->route('index');
    }

    protected function loggedOut(Request $request)
    {
        toast('Logged Out Successfully','success');
        return redirect()->route('index');
    }

}
