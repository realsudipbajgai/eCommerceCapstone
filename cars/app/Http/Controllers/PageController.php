<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransactionController;
use App\Models\Car;
use Illuminate\Support\Facades\Session;
use App\Models\Discount;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    /**
     * Process pre-checkout for the car.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function precheckout(Request $request)
    {
        $orderController = new OrderController();
        // Look for the car id
        $valid = $request->validate(["car_id"=>"required"]);
        $item = Car::find($valid['car_id']);
        if($item->is_deleted)
        {
            $flash = [
                'type' => 'danger',
                'message' => 'This car does not exist anymore'
            ];
            return redirect('/')->with('flash', $flash);
        }
        session(['current_transcation_car_id' => $valid['car_id']]);
        return $orderController->create();
    }
    /**
     * Process post-checkout for the car.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postcheckout(Request $request)
    {
        foreach(session('cart') as $car_id){
            $item = Car::find($car_id)->first();
            if($item->is_deleted)
            {
                $flash = [
                    'type' => 'danger',
                    'message' => 'This car does not exist anymore'
                ];
                return redirect('/')->with('flash', $flash);
            }
        }
        $orderController = new OrderController();
        $transactionController = new TransactionController();
        $cartController = new CartController();
        DB::beginTransaction();
        try{
            $order_id = $orderController->store($request);
            $result = $transactionController->store($request, $order_id);
        }
        catch (\Exception $e) {
            DB::rollback();
        }
        if ($result === true){
            if(!empty($request['promo_code'])){
                $discount=Discount::where('promo_code',$request['promo_code'])->first();
                $discount->is_used=1;
                $discount->save();
            }
            $cartController->removeFromCartByCarId($request['car_id']);
            $item->is_deleted = false;
            $item->save();
            session(['current_transcation_car_id' => 0]);

            $flash = [
                'type' => 'success',
                'message' => 'Payment is succesful.'
            ];
            return redirect('/')->with('flash', $flash);
        }
        else
        {
            $order=Order::find($order_id);
            $order->is_deleted=1;
            $order->save();
            return back()->withInput()->with('flash',$result);
        }
        
        
    }
}