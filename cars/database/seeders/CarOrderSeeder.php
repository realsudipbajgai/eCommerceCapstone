<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //                'car_id' => rand(1, 10), // Assuming you have 10 cars with IDs from 1 to 10
        $carsOrdersData = [];
        for ($i = 1; $i <= 30; $i++) {
            $carOrderData = [
                'car_id' => rand(1, 10),
                'order_id' => rand(1, 10), // Assuming you have 10 customers with IDs from 1 to 10
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $carsOrdersData[] = $carOrderData;
        }

        // Insert orders data into the database
        DB::table('cars_orders')->insert($carsOrdersData);
    }
}
