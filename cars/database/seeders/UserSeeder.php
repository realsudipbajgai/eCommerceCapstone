<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name'=>'Admin',
            'last_name'=>'Admin',
            'street'=>'123 Portage',
            'city'=>'Winnipeg',
            'postal_code'=>'r2a1c5',
            'province_id'=>1,
            'country'=>'Canada',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone'=>'2042332222',
            'remember_token'=>Str::random(10),
            'is_admin'=>true,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('users')->insert([
            'first_name'=>'John',
            'last_name'=>'Doe',
            'street'=>'123 Main St',
            'city'=>'New York',
            'postal_code'=>'10001',
            'province_id'=>1,
            'country'=>'USA',
            'email'=>'john.doe@example.com',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone'=>'+1 (555) 123-4567',
            'remember_token'=>Str::random(10),
            'is_admin'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('users')->insert([
            'first_name'=>'Jane',
            'last_name'=>'Smith',
            'street'=>'456 Oak Ave',
            'city'=>'Los Angeles',
            'postal_code'=>'90001',
            'province_id'=>1,
            'country'=>'USA',
            'email'=>'jane.smith@example.com',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone'=>'+1 (555) 123-4567',
            'remember_token'=>Str::random(10),
            'is_admin'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('users')->insert([
            'first_name'=>'Michael',
            'last_name'=>'Johnson',
            'street'=>'789 Elm Rd',
            'city'=>'Chicago',
            'postal_code'=>'60601',
            'province_id'=>1,
            'country'=>'USA',
            'email'=>'michael.johnson@example.com',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone'=>'+1 (555) 246-1357',
            'remember_token'=>Str::random(10),
            'is_admin'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('users')->insert([
            'first_name'=>'Emily',
            'last_name'=>'Williams',
            'street'=>'101 Pine Ln',
            'city'=>'Chicago',
            'postal_code'=>'94101',
            'province_id'=>1,
            'country'=>'USA',
            'email'=>'emily.williams@example.com',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone'=>'+1 (555) 789-1234',
            'remember_token'=>Str::random(10),
            'is_admin'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('users')->insert([
            'first_name'=>'Oliver',
            'last_name'=>'Smith',
            'street'=>'123 Main St',
            'city'=>'Toronto',
            'postal_code'=>'M5V 2T6',
            'province_id'=>1,
            'country'=>'Canada',
            'email'=>'oliver.smith@example.com',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone'=>'+1 (416) 123-4567',
            'remember_token'=>Str::random(10),
            'is_admin'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
        DB::table('users')->insert([
            'first_name'=>'Ava',
            'last_name'=>'Johnson',
            'street'=>'456 Queen St',
            'city'=>'Vancouver',
            'postal_code'=>'V6B 1G1',
            'province_id'=>1,
            'country'=>'Canada',
            'email'=>'ava.johnson@example.com',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone'=>'+1 (604) 123-4567',
            'remember_token'=>Str::random(10),
            'is_admin'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
        DB::table('users')->insert([
            'first_name'=>'Ethan',
            'last_name'=>'Brown',
            'street'=>'789 King St',
            'city'=>'Montreal',
            'postal_code'=>'H3C 1J9',
            'province_id'=>1,
            'country'=>'Canada',
            'email'=>'ethan.brown@example.com',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone'=>'+1 (514) 123-4567',
            'remember_token'=>Str::random(10),
            'is_admin'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'first_name'=>'Sophia',
            'last_name'=>'Tremblay',
            'street'=>'321 Front St',
            'city'=>'Calgary',
            'postal_code'=>'T2P 5E9',
            'province_id'=>1,
            'country'=>'Canada',
            'email'=>'sophia.tremblay@example.com',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone'=>'+1 (403) 123-4567',
            'remember_token'=>Str::random(10),
            'is_admin'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'first_name'=>'Mia',
            'last_name'=>'Roy',
            'street'=>'654 Wellington St',
            'city'=>'Ottawa',
            'postal_code'=>'K1A 0A9',
            'province_id'=>1,
            'country'=>'Canada',
            'email'=>'mia.roy@example.com',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone'=>'+1 (613) 123-4567',
            'remember_token'=>Str::random(10),
            'is_admin'=>false,
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

    }
}
