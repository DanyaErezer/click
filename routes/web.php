<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\WebSiteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/heatmap', [WebSiteController::class, 'heatmap']);
Route::get('/chart', [WebSiteController::class, 'chart']);
