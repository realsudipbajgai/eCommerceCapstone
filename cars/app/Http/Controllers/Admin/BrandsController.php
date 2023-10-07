<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        $title = "Brands List";
        $brands = Brand::where('is_deleted', false)->paginate(10);
        return view('admin.brands.index', compact('title', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        $title = "Create New Brand";
        return view('admin.brands.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|string|min:1|max:100',
        ]);

        try {
            Brand::create($valid);
        } catch (\Exception $ex) {
            $flash = [
                'type' => 'danger',
                'message' => 'New Brand Could Not be Added!'
            ];
            return redirect('/admin/brands')->with('flash', $flash);
        }

        $flash = [
            'type' => 'success',
            'message' => 'New Brand Successfully Added!'
        ];
        return redirect('/admin/brands')->with('flash', $flash);
    }

    /**
     * Display the specified resource.
    */
    public function show(string $id)
    {
        $title = "Brand Detail";
        $brand = Brand::where('id', $id)->where('is_deleted', false)->first();
        if (!$brand) {
            $flash = [
                'type' => 'danger',
                'message' => 'Record Does Not Exist in Database'
            ];
            return back()->with('flash', $flash);
        }

        return view('admin.brands.show', compact('brand', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        $title = "Edit Brand";
        $brand = Brand::where('id', $id)->where('is_deleted', false)->first();
        if (!$brand) {
            $flash = [
                'type' => 'danger',
                'message' => 'Record Does Not Exist in Database'
            ];
            return back()->with('flash', $flash);
        }

        return view('admin.brands.edit', compact('brand', 'title'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $valid = $request->validate([
            'name' => 'required|string|min:1|max:100',
        ]);

        $brand = Brand::where('id', $id)->where('is_deleted', false)->first();
        if (!$brand) {
            $flash = [
                'type' => 'danger',
                'message' => "Brand with ID: {$id} Update Failed!!"
            ];
            return back()->with('flash', $flash);
        }

        try {
            $brand->update($valid);
        } catch (\Exception $ex) {
            $flash = [
                'type' => 'danger',
                'message' => "Brand with ID: {$id} Update Failed!!"
            ];
            return back()->with('flash', $flash);
        }

        $flash = [
            'type' => 'success',
            'message' => "Brand with ID: {$id} Successfully Updated"
        ];
        return redirect('/admin/brands')->with('flash', $flash);
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        $brand = Brand::where('id', $id)->where('is_deleted', false)->first();
        if (!$brand) {
            $flash = [
                'type' => 'danger',
                'message' => "Record Does Not Exist in Database"
            ];
            return back()->with('flash', $flash);
        }

        try {
            // Soft delete by setting 'is_deleted' = true
            $brand->update(['is_deleted' => true]);
        } catch (\Exception $ex) {
            $flash = [
                'type' => 'danger',
                'message' => "Failed!!! Make sure related data does not exist in the database !!!"
            ];
            return back()->with('flash', $flash);
        }

        $flash = [
            'type' => 'success',
            'message' => "Brand with ID: {$id} Successfully Soft Deleted"
        ];
        return back()->with('flash', $flash);
    }
         /**
     * Search Cars by Brand, Category, Make, Model, Year, Price
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $search_key=$request['search'];
        if($search_key==''){
            return redirect('/admin/brands');
        }
        $title="Brands List";
        $brands=Brand::where('is_deleted',false)
                    ->where('name','like','%'.$search_key.'%')
                    ->paginate(10);
        if(count($brands)>0){
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
        return view('admin.brands.index',compact('title','brands'))->with('flash',$flash);
    }

}