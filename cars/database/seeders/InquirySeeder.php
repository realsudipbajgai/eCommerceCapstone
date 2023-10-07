<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class InquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inquiries')->insert([
            'name'=>'Admin',
            'email'=>'testuser@gmail.com',
            'phone'=>'204 566 5455',
            'description'=>'This is my inquiry.',
            'is_deleted'=>false,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('inquiries')->insert([
            [
                'name' => 'Jane Doe',
                'email' => 'janedoe@example.com',
                'phone' => '123-456-7891',
                'description' => 'How many passengers can this car comfortably seat?',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bob Smith',
                'email' => 'bobsmith@example.com',
                'phone' => '123-456-7892',
                'description' => 'What safety features does this car have?',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alicejohnson@example.com',
                'phone' => '123-456-7893',
                'description' => 'Is this car available in different colors or with custom options?',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Charlie Brown',
                'email' => 'charliebrown@example.com',
                'phone' => '123-456-7894',
                'description' => 'What is the warranty on this car?',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]
            ]);
    }
}
