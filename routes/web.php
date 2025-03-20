<?php

use App\Http\Controllers\ClickController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\WebSiteController;

Route::get('/', function () {
    return view('/layouts/home');
});

Route::get('/click/{webSiteId}', [ClickController::class, 'click'])->name('click');
Route::get('/heatmap/{webSiteId}', [ClickController::class, 'heatmap'])->name('heatmap');
Route::get('/chart/{webSiteId}', [ClickController::class, 'chart'])->name('chart');

Route::resource('webSites', WebSiteController::class);
