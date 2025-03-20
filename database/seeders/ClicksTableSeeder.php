<?php

namespace Database\Seeders;

use App\Models\Click;
use App\Models\WebSite;
use Illuminate\Database\Seeder;

class ClicksTableSeeder extends Seeder
{
    public function run()
    {

        $webSites = WebSite::all();


        $webSites->each(function ($webSite) {
            Click::create([
                'web_sites_id' => 1,
                'url' => $webSite->url,
                'date' => now(),
                'x' => rand(0, 1000),
                'y' => rand(0, 1000),
                'window_width' => rand(800, 1920),
                'window_height' => rand(600, 1080),
                'document_width' => rand(800, 1920),
                'document_height' => rand(600, 1080),
            ],
            [
                'web_sites_id' => 2,
                'url' => $webSite->url,
                'date' => now(),
                'x' => rand(0, 1000),
                'y' => rand(0, 1000),
                'window_width' => rand(800, 1920),
                'window_height' => rand(600, 1080),
                'document_width' => rand(800, 1920),
                'document_height' => rand(600, 1080),
            ],
                ['web_sites_id' => 3,
                    'url' => $webSite->url,
                    'date' => now(),
                    'x' => rand(0, 1000),
                    'y' => rand(0, 1000),
                    'window_width' => rand(800, 1920),
                    'window_height' => rand(600, 1080),
                    'document_width' => rand(800, 1920),
                    'document_height' => rand(600, 1080),

                ]);

        });
    }
}
