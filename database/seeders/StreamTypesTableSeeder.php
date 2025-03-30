<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StreamTypesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('stream_types')->insert([
            ['id' => 1, 'name' => 'Sports'],
            ['id' => 2, 'name' => 'E-Book'],
            ['id' => 3, 'name' => 'Podcast'],
            ['id' => 4, 'name' => 'Arts'],
            ['id' => 5, 'name' => 'Music'],
        ]);
    }
}
