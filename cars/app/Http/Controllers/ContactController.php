<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
class ContactController extends Controller
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
        $title="Contact Us";
        return view('contact.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid=$request->validate([
            'name'=>'required|string|min:1|max:255',
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone'=>'required|string|min:2|max:15',
            'subject'=>'required|string|min:2|max:255',
            'description'=>'required|string',
        ]);

        Inquiry::create($valid);
        $flash=[
            'type'=>'success',
            'message'=>'Your Inquiry Successfully sent.'
        ];
        return redirect('/')->with('flash',$flash);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
