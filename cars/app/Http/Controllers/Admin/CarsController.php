<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Cars List";
        $cars=Car::where('is_deleted',false)->paginate(10);
        return view('admin.cars.index',compact('title','cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all()->pluck('name','id');
        $brands=Brand::all()->pluck('name','id');
        $title="Create New Car";
        return view('admin.cars.create',compact('title','categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid=$request->validate([
            'category_id'=>'required|integer',
            'brand_id'=>'required|integer',
            'make'=>'required|string|min:1|max:100',
            'model'=>'required|string|min:1|max:100',
            'year'=>'required|integer',
            'price'=>'required|numeric|between:0,100000000000000|regex:/^\d+(\.\d\d)?$/',
            'mileage'=>'required|numeric|between:0,999999.99',
            'color'=>'required|string|min:1|max:100',
            'fuel_type'=>'required|string|min:1|max:100',
            'description'=>'required|string',
            // 'image'=>'nullable|image',
            'image'=>'required|image',
        ],[
            'category_id.required'=>'Category is required',
            'category_id.integer'=>'Category is required',
            'brand_id.required'=>'Brand is required',
            'brand_id.integer'=>'Brand is required'
        ]);

        $filename='default.jpg';
        if($file=$request->file('image')){
            $filename=uniqid().'_'.$file->getClientOriginalName();
            Storage::disk('public')->put($filename,file::get($file));
        }
        $valid['image']=$filename;
        try{
            Car::create($valid);
        }catch(\Exception $ex){
            $flash=[
                'type'=>'danger',
                'message'=>'New Car Could Not be Added!'
            ];
            return redirect('/admin/cars')->with('flash',$flash);
        }
        $flash=[
            'type'=>'success',
            'message'=>'New Car Successfully Added!'
        ];
        return redirect('/admin/cars')->with('flash',$flash);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title="Car Detail";
        $car=Car::with(['category','brand'])->where('id',$id)->first();
        return view('admin.cars.show',compact('car','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title="Edit Car";
        $categories=Category::all()->pluck('name','id');
        $brands=Brand::all()->pluck('name','id');
        $car=Car::with(['category','brand'])->where('id',$id)->first();
        return view('admin.cars.edit',compact('car','title','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $valid=$request->validate([
            'category_id'=>'required|integer',
            'brand_id'=>'required|integer',
            'make'=>'required|string|min:1|max:100',
            'model'=>'required|string|min:1|max:100',
            'year'=>'required|integer',
            'price'=>'required|numeric|between:0,100000000000000|regex:/^\d+(\.\d\d)?$/',
            'mileage'=>'required|numeric|between:0,100000000|regex:/^\d+(\.\d\d)?$/',
            'color'=>'required|string|min:1|max:100',
            'fuel_type'=>'required|string|min:1|max:100',
            'description'=>'required|string',
            'image'=>'nullable|image',
        ],[
            'category_id.required'=>'Category is required',
            'category_id.integer'=>'Category is required',
            'brand_id.required'=>'Brand is required',
            'brand_id.integer'=>'Brand is required'
        ]);
        $filename=false;
        if($file=$request->file('image')){
            $filename=uniqid().'_'.$file->getClientOriginalName();
            Storage::disk('public')->put($filename,file::get($file));
        }
        if($filename){
            $valid['image']=$filename;
        }else{
            unset($valid['image']);
        }
        if(Car::where('id',$id)->update($valid)){
            $flash=[
                'type'=>'success',
                'message'=>"Car with id: {$id} Successfully Updated"
            ];
            return redirect('/admin/cars')->with('flash',$flash);
        }else{
            $flash=[
                'type'=>'danger',
                'message'=>"Car with id: {$id} Update Failed!!"
            ];
            return redirect('/admin/cars')->with('flash',$flash);;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car=Car::find($id);
        if(empty($car)){
            $flash=[
                'type'=>'danger',
                'message'=>"Record Does Not Exist in Database"
            ];
            return back()->with('flash',$flash);
        }
        try{
            $car->update(['is_deleted' => true]);
        }catch(\Exception $ex){
            $flash=[
                'type'=>'danger',
                'message'=>"Failed!!! Make sure related data does not exist on the database !!!"
            ];
            return back()->with('flash',$flash);
        }
        $flash=[
            'type'=>'success',
            'message'=>"Car with id: {$id} Successfully Deleted"
        ];
        return back()->with('flash',$flash);
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
            return redirect('/admin/cars');
        }
        $title="Cars List";
         //Get all cars
        //then filter cars, filter for related brand name or category
        $cars=Car::where('is_deleted',false)
                    ->Where('make','like','%'.$search_key.'%')
                    ->orWhere('model','like','%'.$search_key.'%')
                    ->orWhere('year','like','%'.$search_key.'%')
                    ->orWhere('price','like','%'.$search_key.'%')
                    ->orWhere('color','like','%'.$search_key.'%')
                    ->orWhereHas('brand',function($q) use($search_key){
                        $q  ->Where('name','like','%'.$search_key.'%');
                    })
                    ->orWhereHas('category',function($q) use($search_key){
                        $q  ->Where('name','like','%'.$search_key.'%');
                    })
                    ->paginate(10);
        if(count($cars)>0){
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
        return view('admin.cars.index',compact('title','cars'))->with('flash',$flash);
    }
}