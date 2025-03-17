<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClickController;


Route::post('/clicks', [ClickController::class, 'save']);
