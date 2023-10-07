<?php
// app/Http/Controllers/Admin/DashboardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with various statistics.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = "Admin Dashboard";

        // Top Sale Car
        $topSaleCar = Car::select('cars.*', DB::raw('COUNT(cars_orders.car_id) as total_sales'))
            ->join('cars_orders', 'cars.id', '=', 'cars_orders.car_id')
            ->groupBy('cars.id')
            ->orderByDesc('total_sales')
            ->first();

        // Least Sale Car
        $leastSaleCar = Car::select('cars.*', DB::raw('COUNT(cars_orders.car_id) as total_sales'))
            ->leftJoin('cars_orders', 'cars.id', '=', 'cars_orders.car_id')
            ->groupBy('cars.id')
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

        return view('admin.index', compact('title', 'topSaleCar', 'leastSaleCar', 'lastDaySoldCarPrice', 'pendingCarOrders'));
    }
}
