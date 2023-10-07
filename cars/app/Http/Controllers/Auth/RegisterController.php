<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Province;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }
    public function showRegistrationForm()
    {
        $provinces=Province::all()->pluck('name','id');
        return view('auth.register', compact('provinces'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'first_name'=>'required|string|regex:/^[\w\s\.\-]{2,255}$/',
            'last_name'=>'required|string|min:2|max:100|regex:/^[\w\s\.\-]{2,255}$/',
            'country'=>'required|string|min:4|max:100|regex:/^[\w\s\.\-]{2,255}$/',
            'street'=>'required|string|min:4|max:100|regex:/^[\w\s\.\-]{2,255}$/',
            'city'=>'required|string|min:4|max:100|regex:/^[\w\s\.\-]{2,255}$/',
            'province_id'=>'required|integer',
            'postal_code'=>'required|string|min:6|max:100|regex:/^[a-zA-Z][\d][a-zA-Z][\s]?[\d][a-zA-Z][\d]$/',
            'phone'=>'required|string|min:9|max:100|regex:/^([+][\d]{1,3}\s?)?([\d]{3}[ .-]?[\d]{3}[ .-]?[\d]{4})$/',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => 'required|email|unique:users',
        ],[
            'province_id.required'=>'Province is required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'country' => $data['country'],
            'street' => $data['street'],
            'city' => $data['city'],
            'province_id' => $data['province_id'],
            'postal_code' => $data['postal_code'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
