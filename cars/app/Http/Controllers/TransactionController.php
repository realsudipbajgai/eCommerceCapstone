<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pacewdd\Bx\_5bx;
use App\Models\Transaction;
use App\Exceptions;
use Illuminate\Support\Facades\Session;
use Throwable;

/**
 * Class TransactionController
 * @package App\Http\Controllers
 */
class TransactionController extends Controller
{
    /**
     * Process the transaction and store the details in the database.
     *
     * @param Request $request
     * @param int $order_id
     * @return bool|string
     */
    //function to checkout
    public function store(Request $request, $order_id)
    {
        //LOGIN ID = 2257811
        //APIKEY = a88c8843898e4daad5646322ca06f14d 
        $loginID = "2257811";
        $apiKey = "a88c8843898e4daad5646322ca06f14d";


        $valid = $request->validate([
            'card_num' => 'required',
            'total' => 'required',
            'cvv' => 'required',
            'card_type' => 'required'
        ]);

        try {
            $expireMonth = $request['expiry-month'];
            $expireYear = $request['expiry-year'];
            $expireDate = $expireMonth . $expireYear;
            $transaction = new _5bx($loginID, $apiKey);
            $transaction->amount($valid['total']);
            $transaction->card_num($valid['card_num']); // credit card number
            $transaction->exp_date($expireDate); // eg  1118 
            $transaction->cvv($valid['cvv']); // card cvv number
            $transaction->ref_num($order_id); // your reference or invoice number
            $transaction->card_type($valid['card_type']); // card type

            $response = $transaction->authorize_and_capture(); // returns object
            $errors = $response->transaction_response->errors;
            $errorsArray = (Array)$errors;
            //dd(gettype($response->transaction_response->errors));
            if ($response->transaction_response->response_code == '1') {
                // Your transaction was authorized... 
                //session()->flash('success', 'Success! Authorization Code: ' . 
                //    $response->transaction_response->auth_code);
                // Save transaction to database
                // Update order with transaction_id
                // redirect to thankyou/invoice page

                $transaction = new Transaction();
                $transaction->order_id = $order_id;
                $transaction->transaction_id = $response->transaction_response->trans_id;
                $transaction->transaction_response = json_encode($response->transaction_response);
                $transaction->save();
                return true;
            } elseif(count($errorsArray)>0) {
                // response with specific errors
                $errors = '';
                foreach ($errorsArray as $error) {
                    $errors .= "\n".$error;
                }
                // Set a flash message for error if the error(s) is specific
                $flash = [
                    'type' => 'danger',
                    'message' => 'Failure!  Authorization errors: ' . $errors
                ];
                // Redirect back to payment form with errors
                
            } else {
                // Failure, but no specific errors
                $flash = [
                    'type' => 'danger',
                    'message' => 'Failure!  There was a problem processing your transaction.'
                ];
                // Redirect back to payment form with errors
            }
            $transaction = new Transaction();
            $transaction->order_id = $order_id;
            $transaction->transaction_id = $response->transaction_response->trans_id;
            $transaction->transaction_response = json_encode($response->transaction_response);
            $transaction->save();
            return $flash;
        } catch (Throwable $e) {
            die($e->getMessage());
        }
    }
}
