<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Car;
use App\Models\Order;
use App\Models\Discount;
use App\Models\CarOrder;
use App\Models\Province;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexByUserId()
    {
        $title = 'Order List';
        
        if (!Auth::check()) {
            $flash=[
                'type'=>'info',
                'message'=>'You must be logged in to view that resource !!!'
            ];
            return redirect('/login')->with('flash',$flash);
        }
        $id=auth()->user()->id;
        $orders = Order::where("customer_id",$id)->where("is_deleted",false)->get();
        return view('orders.index', compact('title','orders'));
    }
    public function show($id)
    {
        $title = 'Order '.$id;
        if (!Auth::check()) {
            $flash=[
                'type'=>'info',
                'message'=>'You must be logged in to view that resource !!!'
            ];
            return redirect('/login')->with('flash',$flash);
        }
        $order = Order::with("cars")->find($id);

        return view('orders.show', compact('title','order'));
    }

    public function store(Request $request)
    {
        $user=User::find(auth()->user()->id);
        $order = new Order();
        $order->name = $user->first_name.' '.$user->last_name;
        $order->customer_id = auth()->user()->id;
        $order->street = $user->street;
        $order->city = $user->city;
        $order->province_state = $user->province->name;
        $order->postal_code = $user->postal_code;
        $order->country = $user->country;
        $order->sub_total = $request['sub_total'];
        $order->shipping_cost = $request['shipping_cost'];
        $order->gst = floatval($request['gst']);
        $order->pst = floatval($request['pst']);
        $order->total = $request['total'];
        $order->shipping_cost = $request['shipping_cost'];
        $order->order_status ="Pending";
        if(!$order->save())
        {
            return false;
        }
        //if order is stored, get that id and save all cars  on pivot table for that id
        //key is car_id and value is the car id (1)
        foreach(session('cart') as $car_key_pair){
            $car_order=new CarOrder();
            $car_order->car_id=$car_key_pair['car_id'];
            $car_order->order_id=$order->id;
            $car_order->save();
        }
        return $order->id;
    }
    public function create()
    {
        if (!Auth::check()) {
            $flash=[
                'type'=>'info',
                'message'=>'You must be logged in to view that resource !!!'
            ];
            return redirect('/login')->with('flash',$flash);
        }
        // Fetch cart items from the session
        $cartItems = session('cart', []);

        // Check if the cart is empty
        if (empty($cartItems)) {
            $flash=[
                'type'=>'info',
                'message'=>'Your cart is empty. Please add items to your cart first.'
            ];
            return redirect('/cars')->with('flash',$flash);
        }
        // If the cart is not empty, proceed to fetch additional car details and display the cart page
        $cart_cars=[];
        foreach (session('cart') as $car_key_pair) {
           $car=Car::find($car_key_pair['car_id'])->first()->toArray();
           if(!empty($car)){
            $cart_cars[]=$car;
           }
        }
        $title = 'Checkout';
        $user=User::find(auth()->user()->id);
        $province=Province::find($user->province_id);
        if(empty($province)){
            $flash=[
                'type'=>'error',
                'message'=>'Unable to calculate tax. Please, update your address and try again.'
            ];
            return redirect('/cart')->with('flash',$flash);
        }

        return view('orders.create', compact('title','cart_cars','user'));

    }

    public function discount(Request $request){
        if (!Auth::check()) {
            $flash=[
                'type'=>'info',
                'message'=>'You must be logged in to view that resource !!!'
            ];
            return redirect('/login')->with('flash',$flash);
        }
        $valid = $request->validate([
            'promo_code'=>'required|min:6|max:6'
        ],[
            'promo_code.required'=>'Invalid Promo Code',
            'promo_code.min'=>'Invalid Promo Code',
            'promo_code.max'=>'Invalid Promo Code'
        ]);
        $discount=Discount::where('promo_code',$request['promo_code'])
        ->where('is_used',false)
        ->first();
        if (empty($discount)) {
            $flash = [
                'type' => 'danger',
                'message' => 'Invalid Promo Code'
            ];
            return redirect()->back()->with('flash', $flash);
        }
        $discount['has_applied']=true;
        return redirect('/checkout')->with('discount',$discount);
    }

}