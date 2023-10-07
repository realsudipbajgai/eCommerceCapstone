<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name'=>'Sedan',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('categories')->insert([
            'name'=>'SUV',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('categories')->insert([
            'name'=>'Truck',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('categories')->insert([
            'name'=>'Van',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
