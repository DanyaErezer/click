<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\WebSiteController;

Route::get('/', function () {
    return view('/layouts/home');
});

Route::get('/test', function () {
    return view('/layouts/test');
});

Route::get('/heatmap', [WebSiteController::class, 'heatmap']);
Route::get('/chart', [WebSiteController::class, 'chart']);
Route::resource('webSites', WebSiteController::class);
