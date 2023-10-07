<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Generate random payments data
       $paymentStatuses = ['Declined', 'Completed', 'Pending'];

       $paymentsData = [];
       for ($i = 1; $i <= 10; $i++) {
           $paymentData = [
               'order_id' => $i, // Assuming you have 10 orders with IDs from 1 to 10
               'credit_card_info' => 'Credit Card Info for Order ' . $i,
               'payment_status' => $paymentStatuses[array_rand($paymentStatuses)],
               'created_at' => now(),
               'updated_at' => now(),
           ];
           $paymentsData[] = $paymentData;
       }

       // Insert payments data into the database
       DB::table('payments')->insert($paymentsData);
        
    }
}
