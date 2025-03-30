<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'test1',
                'email' => 'test1@example.com',
                'password' => Hash::make('test1'),
                'api_key' => Str::random(60),  // some random string 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'test2',
                'email' => 'test2@example.com',
                'password' => Hash::make('test2'),
                'api_key' => Str::random(60), // some random string 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
