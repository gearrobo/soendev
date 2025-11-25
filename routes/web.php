<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\UploadSnapshotController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/map', [SensorDataController::class, 'showMap']);

// New route for listing snapshots
Route::get('/snapshots', [UploadSnapshotController::class, 'listSnapshots']);
