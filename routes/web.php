<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\UploadSnapshotController;
use App\Http\Controllers\BlogController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/map', [SensorDataController::class, 'showMap']);

// New route for listing snapshots
Route::get('/snapshots', [UploadSnapshotController::class, 'listSnapshots']);

Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{category}', [BlogController::class, 'category'])
    ->name('blog.category');

Route::get('/blog/{category}/{slug}', [BlogController::class, 'show'])
    ->name('blog.show');
