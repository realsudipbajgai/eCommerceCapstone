<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Session;

/**
 * Class CartController
 * @package App\Http\Controllers
 */
class CartController extends Controller
{
    /**
     * Add a car to the cart.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToCart(Request $request)
    {
        $carId = $request->input('car_id');

        // Fetch cart items from the session
        $cartItems = session('cart', []);

        // Check if the car is already in the cart
        $carExists = false;
        foreach ($cartItems as $item) {
            if ($item['car_id'] === $carId) {
                $carExists = true;
                break;
            }
        }

        // If the car is not already in the cart, add it
        if (!$carExists) {
            $cartItems[] = ['car_id' => $carId];
            session(['cart' => $cartItems]);

            // Set a flash message for success
            Session::flash('flash', [
                'type' => 'success',
                'message' => 'Car added to cart successfully!',
            ]);
        } else {
            // Set a flash message for info if the car is already in the cart
            Session::flash('flash', [
                'type' => 'info',
                'message' => 'Car is already in the cart.',
            ]);
        }

        // Redirect back to the car detail page
        return redirect('/cars/' . $carId);
    }

    /**
     * Show the cart contents.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show()
    {
        // Fetch cart items from the session
        $cartItems = session('cart', []);

        // Check if the cart is empty
        if (empty($cartItems)) {
            // Set a flash message to inform the user that the cart is empty
            Session::flash('flash', [
                'type' => 'info',
                'message' => 'Your cart is empty. Please add items to your cart first.',
            ]);

            // Redirect the user to a different page (e.g., home page)
            return redirect()->route('cars.index'); // Replace 'home' with the route name of your home page
        }

        // If the cart is not empty, proceed to fetch additional car details and display the cart page
        $cartData = [];
        foreach ($cartItems as $item) {
            $car = Car::find($item['car_id']);
            if ($car) {
                $cartData[] = [
                    'car_id' => $car->id,
                    'make' => $car->make,
                    'model' => $car->model,
                    'price' => $car->price,
                    'image' => $car->image, // Add any other car attributes you want to display
                ];
            }
        }

        return view('cart', ['cartData' => $cartData]);
    }
    /**
     * Remove a car from the cart by car ID.
     *
     * @param string $car_id
     * @return void
     */
    public function removeFromCartByCarId($car_id)
    {
        // Fetch cart items from the session
        $cartItems = session('cart', []);

        $cartItems = array_filter($cartItems, function ($element)use($car_id) {
            return $element['car_id'] === $car_id;
            //                   ↑
            // Array value which you want to delete
        });
        session(['cart' => $cartItems]);
    }
    /**
     * Remove a car from the cart by index.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeFromCart(Request $request)
    {
        $index = $request->input('index');

        // Fetch cart items from the session
        $cartItems = session('cart', []);

        // Check if the index is valid
        if ($index >= 0 && $index < count($cartItems)) {
            // Remove the item from the cart
            array_splice($cartItems, $index, 1);
            session(['cart' => $cartItems]);

            // Set a flash message for success
            Session::flash('flash', [
                'type' => 'success',
                'message' => 'Car removed from cart successfully!',
            ]);
        } else {
            // Set a flash message for error if the index is invalid
            Session::flash('flash', [
                'type' => 'error',
                'message' => 'Invalid index for car removal.',
            ]);
        }

        return redirect()->route('cart.show');
    }
}
