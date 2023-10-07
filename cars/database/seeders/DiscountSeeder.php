<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discounts')->insert([
            'promo_code'=>'a1b2c3',
            'discount_percentage'=>1.23,
            'is_used'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('discounts')->insert([
            'promo_code'=>'abcdef',
            'discount_percentage'=>2.23,
            'is_used'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('discounts')->insert([
            'promo_code'=>'123456',
            'discount_percentage'=>3.23,
            'is_used'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('discounts')->insert([
            'promo_code'=>'234567',
            'discount_percentage'=>2.50,
            'is_used'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('discounts')->insert([
            'promo_code'=>'345678',
            'discount_percentage'=>2.60,
            'is_used'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('discounts')->insert([
            'promo_code'=>'456789',
            'discount_percentage'=>2.73,
            'is_used'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('discounts')->insert([
            'promo_code'=>'567890',
            'discount_percentage'=>5,
            'is_used'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('discounts')->insert([
            'promo_code'=>'678901',
            'discount_percentage'=>4.80,
            'is_used'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
