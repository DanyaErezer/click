<?php

use App\Http\Controllers\ClickController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\WebSiteController;

Route::get('/', function () {
    return view('/layouts/home');
});

Route::get('/test', function () {
    return view('/layouts/test');
});

Route::get('/heatmap', [ClickController::class, 'heatmap']);
Route::get('/chart', [ClickController::class, 'chart']);
Route::resource('webSites', WebSiteController::class);
