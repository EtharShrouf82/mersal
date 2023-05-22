<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobApplyController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MechanismController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ScreenPriceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ScreenController;
use App\Http\Controllers\Admin\ScreenTypeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {
        Route::group(['prefix' => 'admin', 'middleware' => 'guest:web', 'namespace' => 'Admin'], function () {
            Route::get('/login', [LoginController::class, 'index'])->name('login');
            Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
        });

        //Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {
        Route::group(['prefix' => 'admin', 'middleware' => ['auth:web', 'is_admin'], 'namespace' => 'Admin'], function () {
            Route::get('/', [DashboardController::class, 'index']);
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
            Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
            Route::resource('/permission', PermissionController::class);
            Route::resource('/role', RoleController::class);

            Route::resource('/slider', SliderController::class);
            Route::get('/slider/status/update', [SliderController::class, 'updateStatus'])->name('slider.update.status');

            Route::resource('/cats', CatController::class);
            Route::get('/cat/status/update', [CatController::class, 'updateStatus'])->name('cat.update.status');

            Route::resource('/products', ProductController::class);
            Route::get('/product/status/update', [ProductController::class, 'updateStatus'])->name('product.update.status');

            Route::resource('/mechanism', MechanismController::class);
            Route::get('/mechanism/status/update', [MechanismController::class, 'updateStatus'])->name('mechanism.update.status');

            Route::resource('/service', ServiceController::class);
            Route::get('/service/status/update', [ServiceController::class, 'updateStatus'])->name('service.update.status');

            Route::resource('/clients', ClientController::class);
            Route::get('/client/status/update', [ClientController::class, 'updateStatus'])->name('client.update.status');

//            Route::resource('/city', CityController::class);
//            Route::get('/city/status/update', [CityController::class, 'updateStatus'])->name('city.update.status');

            Route::resource('/screen_type', ScreenTypeController::class);
            Route::get('/screen_type/status/update', [ScreenTypeController::class, 'updateStatus'])->name('screen_type.update.status');

            Route::resource('/screens', ScreenController::class);
            Route::get('/screen/status/update', [ScreenController::class, 'updateStatus'])->name('screen.update.status');

            Route::resource('/plans', PlanController::class);
            Route::get('/plan/status/update', [PlanController::class, 'updateStatus'])->name('plan.update.status');

            Route::resource('/prices', ScreenPriceController::class);
            Route::get('/price/status/update', [ScreenPriceController::class, 'updateStatus'])->name('price.update.status');


            Route::resource('/about_us', AboutUsController::class);
            Route::get('/about_us/status/update', [AboutUsController::class, 'updateStatus'])->name('about_us.update.status');

            Route::resource('/jobs', JobController::class);
            Route::get('/job/status/update', [JobController::class, 'updateStatus'])->name('job.update.status');

            Route::resource('/jobs_apply', JobApplyController::class);
            Route::get('/job_apply/status/update', [JobApplyController::class, 'updateStatus'])->name('job_apply.update.status');

            Route::resource('/contact_us', ContactUsController::class);
            Route::get('/contact_us/status/update', [ContactUsController::class, 'updateStatus'])->name('contact_us.update.status');
            Route::get('/contact_us/show/{id}', [ContactUsController::class, 'show']);

            Route::get('/settings', [SettingController::class, 'index'])->name('settings');
            Route::get('/settings/cacheControll', [SettingController::class, 'cacheControll']);
            Route::post('/settings/{id}/update', [SettingController::class, 'update'])->name('settings.update');

            Route::controller(UploadController::class)->group(function () {
                Route::post('/forala/uploadimg', 'uploadimg')->name('uploadforalaimg');
                Route::post('/forala/uploadfile', 'uploadfile')->name('uploadforalafile');
                Route::post('/upload/uploadadmin', 'admin')->name('uploadadmin');
                Route::post('/forala/uploadVideo', 'uploadVideo')->name('uploadFroalaVideo');
                Route::post('/uploads/uploadslider', 'uploadslider')->name('uploadslider');
                Route::post('/uploads/uploadProduct', 'uploadProduct')->name('uploadProduct');
                Route::post('/uploads/uploadProducts', 'uploadProducts')->name('uploadProducts');
                Route::post('/uploads/uploadScreens', 'uploadScreens')->name('uploadScreens');
                Route::post('/uploads/uploadService', 'uploadService')->name('uploadService');
                Route::post('/uploads/uploadClient', 'uploadClient')->name('uploadClient');
                Route::post('/uploadJob/uploadJob', 'uploadJob')->name('uploadJob');
                //                Route::post('/forala/action', 'UploadController@index')->name('uploadfile');
                //                Route::post('/uploads/upload', 'UploadController@upload')->name('uploadfiles');
                //                Route::post('/uploads/uploadBrand', 'UploadController@uploadBrand')->name('uploadBrand');
                //                Route::post('/uploadBlog/uploadBlog', 'UploadController@uploadBlog')->name('uploadBlog');
                //                Route::post('/uploadBlog/uploadCatSecondary', 'UploadController@uploadCatSecondary')->name('uploadCatSecondary');
            });

        });
    });
