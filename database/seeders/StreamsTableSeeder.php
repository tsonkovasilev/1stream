<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StreamsTableSeeder extends Seeder
{
    public function run(): void
    {
        $user1 = DB::table('users')->where('name', 'test1')->first();
        $user2 = DB::table('users')->where('name', 'test2')->first();

        $streams = [
            [
                'id' => Str::uuid(),
                'user_id' => $user1->id,
                'title' => 'Live Football Match',
                'description' => 'Watch the big game live!',
                'tokens_price' => 100,
                'type' => 1,
                'date_expiration' => now()->addDays(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'user_id' => $user2->id,
                'title' => 'Indie Music Stream',
                'description' => 'Enjoy fresh indie tunes.',
                'tokens_price' => 80,
                'type' => 5,
                'date_expiration' => now()->addDays(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        DB::table('streams')->insert($streams);
    }
}
