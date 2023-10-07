<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Car;
use Illuminate\Support\Facades\DB;
use App\Models\Category;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $title = "Admin Dashboard";

    // Top Sale Car
    $topSaleCar = Car::select('cars.*', DB::raw('COUNT(cars_orders.car_id) as total_sales'))
        ->join('cars_orders', 'cars.id', '=', 'cars_orders.car_id')
        ->groupBy('cars.id', 'cars.category_id', 'cars.brand_id', 'cars.make', 'cars.model', 'cars.year', 'cars.price', 'cars.mileage', 'cars.color', 'cars.fuel_type', 'cars.description', 'cars.image', 'cars.is_deleted', 'cars.created_at', 'cars.updated_at')
        ->orderByDesc('total_sales')
        ->first();

    // Least Sale Car
    $leastSaleCar = Car::select('cars.*', DB::raw('COUNT(cars_orders.car_id) as total_sales'))
        ->leftJoin('cars_orders', 'cars.id', '=', 'cars_orders.car_id')
        ->groupBy('cars.id', 'cars.category_id', 'cars.brand_id', 'cars.make', 'cars.model', 'cars.year', 'cars.price', 'cars.mileage', 'cars.color', 'cars.fuel_type', 'cars.description', 'cars.image', 'cars.is_deleted', 'cars.created_at', 'cars.updated_at')
        ->orderBy('total_sales')
        ->first();

    // Total of Last Day Sold Car Price
    $lastDaySoldCarPrice = Order::select(DB::raw('SUM(total) as total_price'))
        ->whereDate('created_at', today()->subDay())
        ->first();

    // Pending Car Orders to Shipped
    $pendingCarOrders = Order::select(DB::raw('COUNT(id) as pending_orders'))
        ->where('order_status', 'Pending')
        ->first();

    // Percentage of selling cars based on categories
    $categorySales = Car::join('cars_orders', 'cars.id', '=', 'cars_orders.car_id')
        ->select('cars.category_id', DB::raw('COUNT(cars_orders.car_id) as total_sales'))
        ->groupBy('cars.category_id')
        ->get();

    $totalSales = $categorySales->sum('total_sales');

    return view('admin.index', compact('title', 'topSaleCar', 'leastSaleCar', 'lastDaySoldCarPrice', 'pendingCarOrders', 'categorySales', 'totalSales'));
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
