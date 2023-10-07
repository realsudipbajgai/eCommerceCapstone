<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provinces')->insert([
            'name'=>'Manitoba',
            'pst'=>'7.0',
            'gst_hst'=>'5.0',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('provinces')->insert([
            'name'=>'Alberta',
            'pst'=>'0',
            'gst_hst'=>'5.0',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('provinces')->insert([
            'name'=>'Yukon',
            'pst'=>'0',
            'gst_hst'=>'5.0',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('provinces')->insert([
            'name'=>'Northwest Territories',
            'pst'=>'0',
            'gst_hst'=>'5.0',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('provinces')->insert([
            'name'=>'Nunavut',
            'pst'=>'0',
            'gst_hst'=>'5.0',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('provinces')->insert([
            'name'=>'Saskatchewan',
            'pst'=>'6.0',
            'gst_hst'=>'5.0',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('provinces')->insert([
            'name'=>'British Columbia',
            'pst'=>'7.0',
            'gst_hst'=>'5.0',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('provinces')->insert([
            'name'=>'Ontario',
            'pst'=>'0',
            'gst_hst'=>'13.0',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('provinces')->insert([
            'name'=>'Quebec',
            'pst'=>'9.975',
            'gst_hst'=>'5.0',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('provinces')->insert([
            'name'=>'New Brunswick',
            'pst'=>'0',
            'gst_hst'=>'15.0',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('provinces')->insert([
            'name'=>'Nova Scotia',
            'pst'=>'0',
            'gst_hst'=>'15.0',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('provinces')->insert([
            'name'=>'Prince Edward Island',
            'pst'=>'0',
            'gst_hst'=>'15.0',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('provinces')->insert([
            'name'=>'Newfoundland and Labrador',
            'pst'=>'0',
            'gst_hst'=>'15.0',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
