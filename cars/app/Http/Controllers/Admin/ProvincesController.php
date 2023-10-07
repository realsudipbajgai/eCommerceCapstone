<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;

class ProvincesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Provinces List";
        $provinces = Province::where('is_deleted', false)->get();
        return view('admin.provinces.index', compact('title', 'provinces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Province";
        return view('admin.provinces.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|string|min:1|max:100',
            'pst' => 'required|numeric|between:0,100|regex:/^\d+(\.\d\d)?$/',
            'gst_hst' => 'required|numeric|between:0,100|regex:/^\d+(\.\d\d)?$/',
        ]);

        try {
            Province::create($valid);
        } catch (\Exception $ex) {
            $flash = [
                'type' => 'danger',
                'message' => 'New Province Could Not be Added!'
            ];
            return redirect('/admin/provinces')->with('flash', $flash);
        }
        $flash = [
            'type' => 'success',
            'message' => 'New Province Successfully Added!'
        ];
        return redirect('/admin/provinces')->with('flash', $flash);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = "Province Detail";
        $province = Province::find($id);
        return view('admin.provinces.show', compact('province', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = "Edit Province";
        $province = Province::find($id);
        return view('admin.provinces.edit', compact('province', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'name' => 'required|string|min:1|max:100',
            'pst' => 'required|numeric|between:0,100|regex:/^\d+(\.\d\d)?$/',
            'gst_hst' => 'required|numeric|between:0,100|regex:/^\d+(\.\d\d)?$/',
        ]);

        if (Province::where('id', $id)->update($valid)) {
            $flash = [
                'type' => 'success',
                'message' => "Province with id: {$id} Successfully Updated"
            ];
        } else {
            $flash = [
                'type' => 'danger',
                'message' => "Province with id: {$id} Update Failed!!"
            ];
        }

        return redirect('/admin/provinces')->with('flash', $flash);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $province = Province::find($id);
        if (empty($province)) {
            $flash = [
                'type' => 'danger',
                'message' => "Record Does Not Exist in Database"
            ];
            return back()->with('flash', $flash);
        }

        try {
            $province->update(['is_deleted' => true]);
        } catch (\Exception $ex) {
            $flash = [
                'type' => 'danger',
                'message' => "Failed!!! Make sure related data does not exist in the database !!!"
            ];
            return back()->with('flash', $flash);
        }

        $flash = [
            'type' => 'success',
            'message' => "Province with id: {$id} Successfully Deleted"
        ];

        return back()->with('flash', $flash);
    }
    public function search(Request $request)
    {
        $search_key=$request['search'];
        if($search_key==''){
            return redirect('/admin/provinces');
        }
        $title="Province List";
        $provinces=Province::where('is_deleted',false)
                    ->Where('name','like','%'.$search_key.'%')
                    ->orWhere('pst','like','%'.$search_key.'%')
                    ->orWhere('gst_hst','like','%'.$search_key.'%')
                    ->paginate(10);
        if(count($provinces)>0){
            $flash=[
                'type'=>'success',
                'message'=>"Search result for: \"{$search_key}\"",
            ];
        }
        else{
            $flash=[
                'type'=>'danger',
                'message'=>"No result found for: \"{$search_key}\"",
            ];
        }
        return view('admin.provinces.index',compact('title','provinces'))->with('flash',$flash);
    }
}
