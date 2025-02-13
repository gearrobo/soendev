<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorDataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/map', [SensorDataController::class, 'showMap']);