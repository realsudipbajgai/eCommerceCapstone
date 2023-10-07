<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Car;
use App\Models\User;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Orders List";
        $orders=Order::with('cars')->where('is_deleted',false)->orderBy('id', 'desc')->paginate(10);
        return view('admin.orders.index',compact('title','orders'));
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title="Order Detail";

        $order=Order::with(['cars','transactions'])->where('id',$id)->first();

        return view('admin.orders.show',compact('order','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title="Edit Order";
        $order=Order::find($id);
        return view('admin.orders.edit',compact('order','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $valid=$request->validate([
            'name'=>'required|string|min:1|max:100',
            'street'=>'required|string|min:1|max:100',
            'city'=>'required|string|min:1|max:100',
            'province_state'=>'required|string|min:1|max:100',
            'country'=>'required|string|min:1|max:100',
            'postal_code'=>'required|string|min:1|max:100',
            'sub_total'=>'required|numeric|between:0,100000000|regex:/^\d+(\.\d\d)?$/',
            'shipping_cost'=>'required|numeric|between:0,100000000|regex:/^\d+(\.\d\d)?$/',
            'gst'=>'required|numeric|between:0,100000000|regex:/^\d+(\.\d\d)?$/',
            'pst'=>'required|numeric|between:0,100000000|regex:/^\d+(\.\d\d)?$/',
            'total'=>'required|numeric|between:0,100000000|regex:/^\d+(\.\d\d)?$/',
            'order_status'=>'required|string|min:5|max:15',
        ]);
        try{
            Order::where('id',$id)->update($valid);
        }catch(\Exception $ex){
            $flash=[
                'type'=>'danger',
                'message'=>"Order with id: {$id} Update Failed!!"
            ];
            return redirect('/admin/orders')->with('flash',$flash);;
        }
        $flash=[
            'type'=>'success',
            'message'=>"Order with id: {$id} Successfully Updated"
        ];
        return redirect('/admin/orders')->with('flash',$flash);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order=Order::find($id);
        if(empty($order)){
            $flash=[
                'type'=>'danger',
                'message'=>"That resource does not exist !!"
            ];
            return redirect('/admin/orders')->with('flash',$flash);;
        }
        try{
            $order->update(['is_deleted' => true]);
        }catch(\Exception $ex){
            $flash=[
                'type'=>'danger',
                'message'=>"Order with id: {$id} could not be deleted!!"
            ];
            return redirect('/admin/orders')->with('flash',$flash);;
        }
        $flash=[
            'type'=>'success',
            'message'=>"Order with id: {$id} Successfully Deleted !!!"
        ];
        return redirect('/admin/orders')->with('flash',$flash);
    }

    /**
     * Search Orders by Customer Name, Car Model, Car Make, Car Brands
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $search_key=$request['search'];
        if($search_key==''){
            return redirect('/admin/orders');
        }
        $title='Orders List';
        //Get all orders first
        //then, filter for related cars
        //then inside cars, filter for related brand name
        $orders=Order::with('cars')->where('name','like','%'.$search_key.'%')
                            ->orWhere('total','like','%'.$search_key.'%')
                            ->orWhere('order_status','like','%'.$search_key.'%')
                            ->orWhereHas('cars',function($q) use($search_key){
                                $q  ->Where('make','like','%'.$search_key.'%')
                                ->orWhere('model','like','%'.$search_key.'%')
                                ->orWhereHas('brand',function($q) use($search_key){
                                    $q  ->Where('name','like','%'.$search_key.'%');
                                });
                            })->paginate(10);
                            
        if(count($orders)>0){
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
        return view('admin.orders.index',compact('title','orders'))->with('flash',$flash);
    }
}