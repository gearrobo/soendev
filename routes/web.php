<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\UploadSnapshotController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\InsightController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DemoController;



Route::get('/demo', [DemoController::class, 'index'])
    ->name('demo');

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/about', [PageController::class, 'about'])
    ->name('about');

Route::get('/career', [PageController::class, 'career'])
    ->name('career');


/*
|--------------------------------------------------------------------------
| Services
|--------------------------------------------------------------------------
*/

Route::get('/services', [PageController::class, 'services'])
    ->name('services');

Route::get('/services/{slug}', [PageController::class, 'service'])
    ->where(
        'slug',
        'software-development|hardware-development|iot|ai-development'
    )
    ->name('services.show');


/*
|--------------------------------------------------------------------------
| Monitoring
|--------------------------------------------------------------------------
*/

Route::get('/map', [SensorDataController::class, 'showMap']);

Route::get('/snapshots', [UploadSnapshotController::class, 'listSnapshots']);


/*
|--------------------------------------------------------------------------
| Blog
|--------------------------------------------------------------------------
*/

Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{category}', [BlogController::class, 'category'])
    ->name('blog.category');

Route::get('/blog/{category}/{slug}', [BlogController::class, 'show'])
    ->name('blog.show');



    /*
|--------------------------------------------------------------------------
| Insight
|--------------------------------------------------------------------------
*/

Route::get('/portfolio', [InsightController::class, 'portfolio'])
    ->name('portfolio');

Route::get('/portfolio/{slug}', [InsightController::class, 'portfolioDetail'])
    ->name('portfolio.show');



/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/

Route::get('/products', [ProductController::class, 'index'])
    ->name('products');

Route::get('/products/{slug}', [ProductController::class, 'show'])
    ->name('products.show');


/*
|--------------------------------------------------------------------------
| Clients
|--------------------------------------------------------------------------
*/

Route::get('/clients', [ClientController::class, 'index'])
    ->name('clients');

Route::get('/clients/{slug}', [ClientController::class, 'show'])
    ->name('clients.show');