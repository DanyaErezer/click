<?php

use App\Http\Controllers\ClickController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebSiteController;

Route::get('/', function () {
    return view('/layouts/home');
});

Route::get('/click/{website}', [ClickController::class, 'click'])->name('click');
Route::get('/heatmap/{website}', [ClickController::class, 'heatmap'])->name('heatmap');
Route::get('/chart/{website}', [ClickController::class, 'chart'])->name('chart');

Route::resource('webSites', WebSiteController::class)->except('show');
