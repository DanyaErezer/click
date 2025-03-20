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
                'name' => 'Юра, Привет!',
                'url' => 'https://Надеюсь мой код застал тебя в добром здравии)',
            ],
            [
                'name' => 'Прости что долго, захотел сделать отслеживание по ширине, высоте и попал в просак)',
                'url' => 'https://Ну и библиотеки долго изучал + js почти в первый раз в глаза увидел, было интересно',
            ],
            [
                'name' => 'В целом благодарен за такое задание, сделал впервые много нового для себя',
                'url' => 'https://Ну и надеюсь нам удастся поработать вместе!',
            ],
        ];


        DB::table('web_sites')->insert($sites);
    }
}
