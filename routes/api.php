<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\UploadSnapshotController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\Api\Esp32FirmwareController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/sensor-data', [SensorDataController::class, 'store']);
Route::get('/sensor-data', [SensorDataController::class, 'index']);

Route::post('/upload-snapshot', [UploadSnapshotController::class, 'uploadSnapshot']);

// Video upload endpoints
Route::post('/ingest/video', [VideoController::class, 'ingestVideo']);
Route::post('/upload/video', [VideoController::class, 'uploadVideo']);
Route::get('/videos', [VideoController::class, 'listVideos']);
Route::get('/videos/{filename}', [VideoController::class, 'getVideo']);
Route::delete('/videos/{filename}', [VideoController::class, 'deleteVideo']);
Route::get('/stream/video/{filename}', [VideoController::class, 'streamVideo']);

Route::get(
    '/esp32/firmware/latest',
    [Esp32FirmwareController::class, 'latest']
);
