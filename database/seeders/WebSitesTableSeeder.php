<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebSitesTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('web_sites')->truncate();


        $sites = [
            [
                'name' => 'Example Site',
                'url' => 'https://example.com',
            ],
            [
                'name' => 'Another Example Site',
                'url' => 'https://anotherexample.com',
            ],
        ];


        DB::table('web_sites')->insert($sites);
    }
}
