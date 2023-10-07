<?php
// app/Http/Controllers/CarController.php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Review;

/**
 * Class CarController
 * @package App\Http\Controllers
 */
class CarController extends Controller
{
    /**
     * Display a listing of cars.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = "Cars List";
        $categories = Category::all();

        // Fetch unique values for make, model, and year from the cars table
        $makes = Car::where('is_deleted', false)->distinct('make')->pluck('make');
        $models = Car::where('is_deleted', false)->distinct('model')->pluck('model');
        $years = Car::where('is_deleted', false)->distinct('year')->pluck('year');

        $selectedMake = null; // for filter sticky value
        $selectedModel = null; // for filter sticky value
        $selectedYear = null; // for filter sticky value
        $minPrice = null; // for filter sticky value
        $maxPrice = null; // for filter sticky value

        $cars = Car::where('is_deleted', false)->paginate(12);

        return view('cars.index', compact('title', 'categories', 'cars', 'makes', 'models', 'years', 'selectedMake', 'selectedModel', 'selectedYear', 'minPrice', 'maxPrice'));
    }

    /**
     * Display the details of a car.
     *
     * @param string $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(string $id)
    {
        $title = "Car Details";
        $car = Car::with('reviews')->where('id',$id)->first();
        // Check if the car is found
        if (!$car) {
            // If car is not found, set a flash message for error
            return redirect()->route('cars.index')->with('flash', [
                'type' => 'danger',
                'message' => 'Car not found.',
            ]);
        }

        return view('cars.show', compact('title', 'car'));
    }
     /**
     * Filter cars by category and other attributes.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function filterByCategory(Request $request)
    {
        $title = "Filtered Cars";
        $categories = Category::all();
        $makes = Car::where('is_deleted', false)->distinct('make')->pluck('make');
        $models = Car::where('is_deleted', false)->distinct('model')->pluck('model');
        $years = Car::where('is_deleted', false)->distinct('year')->pluck('year');

        $categoryId = $request->input('category');
        $selectedMake = $request->input('make');
        $selectedModel = $request->input('model');
        $selectedYear = $request->input('year');
        $minPrice = $request->input('min-price');
        $maxPrice = $request->input('max-price');

        $query = Car::where('is_deleted', false);

        if ($categoryId) {
            // Filter by category if a category ID is provided
            $query->where('category_id', $categoryId);
        }

        if ($selectedMake && $selectedMake !== 'all') {
            $query->where('make', $selectedMake);
        }

        if ($selectedModel && $selectedModel !== 'all') {
            $query->where('model', $selectedModel);
        }

        if ($selectedYear && $selectedYear !== 'all') {
            $query->where('year', $selectedYear);
        }

        if ($minPrice && is_numeric($minPrice)) {
            $query->where('price', '>=', $minPrice);
        }

        if ($maxPrice && is_numeric($maxPrice)) {
            $query->where('price', '<=', $maxPrice);
        }
        $cars = $query->paginate(12);

        return view('cars.index', compact('title', 'categories', 'cars', 'makes', 'models', 'years'))
            ->with([
                'selectedMake' => $selectedMake,
                'selectedModel' => $selectedModel,
                'selectedYear' => $selectedYear,
                'minPrice' => $minPrice,
                'maxPrice' => $maxPrice,
            ]);
    }
    

    /**
     * Search for cars based on the provided query string.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $title = "Search Results";
        $query = $request->input('search-result');
    
        $categories = Category::all();
        $makes = Car::where('is_deleted', false)->distinct('make')->pluck('make');
        $models = Car::where('is_deleted', false)->distinct('model')->pluck('model');
        $years = Car::where('is_deleted', false)->distinct('year')->pluck('year');

        $selectedMake = null; // for filter sticky value
        $selectedModel = null; // for filter sticky value
        $selectedYear = null; // for filter sticky value
        $minPrice = null; // for filter sticky value
        $maxPrice = null; // for filter sticky value
    
        $cars = Car::where('is_deleted', false)
            ->where(function ($q) use ($query) {
                $q->where('make', 'LIKE', "%$query%")
                    ->orWhere('model', 'LIKE', "%$query%");
            })
            ->paginate(12);
    
        return view('cars.index', compact('title', 'categories', 'cars', 'makes', 'models', 'years', 'selectedMake', 'selectedModel', 'selectedYear', 'minPrice', 'maxPrice'));
    }
    /**
     * Add a review for a car.
     *
     * @param Request $request
     * @param string $car_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function review(Request $request,string $car_id)
    {
        $user_id=auth()->user()->id;
        $review=new Review;
        $review->user_id=$user_id;
        $review->car_id=$car_id;
        $review->comment=$request['review'];
        try{
            $review->save();
        }
        catch(\Exception $ex){
            $flash=[
                'type'=>'danger',
                'message'=>'Your review could not be added!! Try Again.'
            ];
            return redirect('/cars/'.$car_id)->with('flash',$flash);
        }
        $flash=[
            'type'=>'success',
            'message'=>'Your review successfully added!!'
        ];
        return redirect('/cars/'.$car_id)->with('flash',$flash);
    }
}
