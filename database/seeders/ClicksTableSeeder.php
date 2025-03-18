<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ClicksTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('clicks')->truncate();


        $clicks = [
            [
                'url' => 'https://trvlilch.ru',
                'date' => Carbon::now()->subHours(2),
                'x' => 100,
                'y' => 200,
            ],
            [
                'url' => 'https://example.com',
                'date' => Carbon::now()->subHours(1),
                'x' => 150,
                'y' => 300,
            ],
            [
                'url' => 'https://anotherexample.com',
                'date' => Carbon::now(),
                'x' => 200,
                'y' => 400,
            ],
        ];


        DB::table('clicks')->insert($clicks);
    }
}
