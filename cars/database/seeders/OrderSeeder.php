<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate random orders data
        $orderStatuses = ['Pending', 'Confirmed', 'Shipped', 'Delivered'];
        $shippingAddresses = [
            '123 Main Street',
            '456 Elm Avenue',
            '789 Oak Road',
            '101 Maple Lane',
            '222 Pine Court',
        ];

        $ordersData = [];
        for ($i = 1; $i <= 10; $i++) {
            $orderData = [
                'customer_id' => rand(1, 10), // Assuming you have 10 customers with IDs from 1 to 10
                'name' => 'Customer ' . $i,
                'street' => $shippingAddresses[array_rand($shippingAddresses)],
                'city' => 'City ' . $i,
                'province_state' => 'Province/State ' . $i,
                'country' => 'Country ' . $i,
                'postal_code' => 'Postal Code ' . $i,
                'sub_total' => rand(1000, 9999) / 100,
                'shipping_cost' => rand(100, 999) / 100,
                'gst' => rand(100, 999) / 100,
                'pst' => rand(100, 999) / 100,
                'total' => rand(10000, 99999) / 100,
                'order_status' => $orderStatuses[array_rand($orderStatuses)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $ordersData[] = $orderData;
        }

        // Insert orders data into the database
        DB::table('orders')->insert($ordersData);
    }
}
