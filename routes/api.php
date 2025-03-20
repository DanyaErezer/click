<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClickController;


Route::get('/clicks', [ClickController::class,'index']);
Route::post('/clicks', [ClickController::class, 'store']);
