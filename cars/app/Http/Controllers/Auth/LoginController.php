<?php

namespace App\Http\Controllers\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
  
         return view('auth.login');
    }

    protected  function authenticated(Request $request, $user)
    {
        $flash=[
            'type'=>'success',
            'message'=>'Welcome, '.$user->first_name
        ];
        if($user->is_admin){
            return redirect('/admin')->with('flash',$flash);
        }
        return redirect(session()->get('url.intended'));
    }
    protected function loggedOut(Request $request){
        $flash=[
            'type'=>'info',
            'message'=>'You have logged out!'
        ];
        return redirect('/login')->with('flash',$flash);
    }
}
