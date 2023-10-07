<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            'user_id'=>rand(1,10),
            'car_id'=>rand(1,10),
            'comment'=>'This is my comment ',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('reviews')->insert([
            'user_id'=>rand(1,10),
            'car_id'=>rand(1,10),
            'comment'=>'This car is amazing! It has great fuel efficiency and a smooth ride.',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
        DB::table('reviews')->insert([
            'user_id'=>rand(1,10),
            'car_id'=>rand(1,10),
            'comment'=>'I love this car! It has a spacious interior and plenty of storage space.',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
        DB::table('reviews')->insert([
            'user_id'=>rand(1,10),
            'car_id'=>rand(1,10),
            'comment'=>'This car is perfect for long road trips. It has comfortable seats and a great sound system.',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
        DB::table('reviews')->insert([
            'user_id'=>rand(1,10),
            'car_id'=>rand(1,10),
            'comment'=>'This car is very reliable and has excellent safety features. I feel safe driving it.',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('reviews')->insert([
            'user_id'=>rand(1,10),
            'car_id'=>rand(1,10),
            'comment'=>'This car has a sleek design and handles well on the road. I love driving it!',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
        DB::table('reviews')->insert([
            'user_id'=>rand(1,10),
            'car_id'=>rand(1,10),
            'comment'=>'This car has excellent acceleration and is very fun to drive. I highly recommend it!',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
        DB::table('reviews')->insert([
            'user_id'=>rand(1,10),
            'car_id'=>rand(1,10),
            'comment'=>'This car is very practical and has a lot of storage space. It is perfect for families.',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
        DB::table('reviews')->insert([
            'user_id'=>rand(1,10),
            'car_id'=>rand(1,10),
            'comment'=>'This car has great gas mileage and is very eco-friendly. I am very happy with my purchase.',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
        DB::table('reviews')->insert([
            'user_id'=>rand(1,10),
            'car_id'=>rand(1,10),
            'comment'=>'This car is very comfortable and has a smooth ride. It is perfect for long road trips.',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
    }
}
