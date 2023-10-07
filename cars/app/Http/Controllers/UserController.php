<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Province;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the User Profile Information.
     */
    public function show()
    {
        if (!Auth::check()) {
            $flash=[
                'type'=>'info',
                'message'=>'You must be logged in to view that resource !!!'
            ];
            return redirect('/login')->with('flash',$flash);
        }
        $title="User Profile";
        $id=auth()->user()->id;
        $user=User::find($id);
        return view('users.show',compact('title','user'));
    }

    /**
     * Get Edit form for User Profile Except Password and Email.
     */
    public function edit()
    {
        $title="Edit Profile";
        $id=auth()->user()->id;
        $user=User::find($id);
        $provinces=Province::all()->pluck('name','id');
        return view('users.edit',compact('title','user','provinces'));
    }

    /**
     * Update User Profile Except Password and Email.
     */
    public function update(Request $request)
    {
        $valid=$request->validate([
            'first_name'=>'required|string|regex:/^[\w\s\.\-]{2,255}$/',
            'last_name'=>'required|string|min:2|max:100|regex:/^[\w\s\.\-]{2,255}$/',
            'country'=>'required|string|min:4|max:100|regex:/^[\w\s\.\-]{2,255}$/',
            'street'=>'required|string|min:4|max:100|regex:/^[\w\s\.\-]{2,255}$/',
            'city'=>'required|string|min:4|max:100|regex:/^[\w\s\.\-]{2,255}$/',
            'province_id'=>'required|integer',
            'postal_code'=>'required|string|min:6|max:100|regex:/^[a-zA-Z][\d][a-zA-Z][\s]?[\d][a-zA-Z][\d]$/',
            'phone'=>'required|string|min:9|max:100|regex:/^([+][\d]{1,3}\s?)?([\d]{3}[ .-]?[\d]{3}[ .-]?[\d]{4})$/',
        ],[
            'province_id.required'=>'Province is required'
        ]);
        $id=auth()->user()->id;
       
        if(User::where('id',$id)->update($valid)){
            $flash=[
                'type'=>'success',
                'message'=>'Profile Successfully Updated!!!'
            ];
        }
        else{
            $flash=[
                'type'=>'error',
                'message'=>'Profile could not be Updated!!!'
            ];
        }
        return redirect('/user/profile')->with('flash',$flash);
    }

    /**
     * Get Edit form for User Password.
     */
    public function edit_password()
    {
        $title="Change Password";
        $id=auth()->user()->id;
        $user=User::find($id);
        return view('users.edit_password',compact('title','user'));
    }

 /**
     * Update User Profile Except Password and Email.
     */
    public function update_password(Request $request)
    {
        $valid=$request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $id=auth()->user()->id;
        $valid['password'] = Hash::make($valid['password']);
        if(User::where('id',$id)->update($valid)){
            $flash=[
                'type'=>'success',
                'message'=>'Password Successfully Updated!!!'
            ];
        }
        else{
            $flash=[
                'type'=>'error',
                'message'=>'Password could not be Updated!!!'
            ];
        }
        return redirect('/user/profile')->with('flash',$flash);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
