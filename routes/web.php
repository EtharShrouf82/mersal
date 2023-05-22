<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {
        Route::get('/crew', function () {
            return view('Front.crew');
        });
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/products', [HomeController::class, 'products'])->name('products');
        Route::get('/product/{id}/{slug?}', [HomeController::class, 'product'])->name('product');
        Route::get('/job/{id}/{slug?}', [HomeController::class, 'job'])->name('job');
        Route::get('/jobs', [HomeController::class, 'jobs'])->name('jobs');
        Route::get('/digital', [HomeController::class, 'digital'])->name('digital');
        Route::get('/getPlans/{id}', [HomeController::class, 'getPlans']);
        Route::get('/getPrices/{id}', [HomeController::class, 'gerPrices']);
        Route::get('/getPrice/{period}/{plan}/{type}', [HomeController::class, 'getPeriod']);
        Route::get('/service/{id}/{slug?}', [HomeController::class, 'service'])->name('front.service');
        Route::get('/media/{id}/{slug?}', [HomeController::class, 'media'])->name('front.media');
        Route::get('/getScreens/{id}', [HomeController::class, 'getScreens']);
        Route::get('/screen/{id}', [HomeController::class, 'screen']);
        Route::post('/send_msg', [HomeController::class,'sendMsg'])->name('send_msg');
        Route::post('/contact', [HomeController::class,'contact'])->name('contact');
        Route::post('/uploads/uploadcv',[HomeController::class,'uploadcv'])->name('uploadcv');
        Route::post('/applyJob',[HomeController::class,'applyJob'])->name('applyJob');

    });
