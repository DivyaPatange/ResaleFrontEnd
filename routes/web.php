<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\AdController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/migrate', function () {
    $exitCode = Artisan::call('migrate');
    return 'DONE'; //Return anything
});

Route::get('/routeList', function () {
    $exitCode = Artisan::call('route:list');
    return Artisan::output(); //Return anything
});

Route::get('/seed', function () {
    $exitCode = Artisan::call('db:seed');
    return 'DONE'; //Return anything
});



Route::get('/', function () {
    return view('auth.dashboard');
})->name('dashboard');
Route::get('/product_detail', function () {
    return view('auth.product_detail');
});
Route::get('/postAdForm1', function () {
    return view('auth.postAdForm1');
});
Route::get('/sidebar', function () {
    return view('auth.sidebar');
})->name('sidebar');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
Route::post('/submitMobileNo', [MobileController::class, 'save'])->name('mobileNo.submit');
Route::post('/otpSubmit', [MobileController::class, 'otpSave'])->name('otp.save');
Route::get('/post-ad', [AdController::class, 'index'])->name('post-ad');
Route::get('/post-ad-form/{id}', [AdController::class, 'postAdForm'])->name('post-ad-form');

// Ajax Route
Route::get('/get-model-list', [AdController::class, 'getModelList']);
Route::get('/get-city-list', [AdController::class, 'getCityList']);
Route::get('/get-brand-list', [AdController::class, 'getBrandList']);

// Save Car Post
Route::post('/save-car-post', [AdController::class, 'saveCarPost']);
Route::get('/single-post-detail/{id}', [AdController::class, 'getSinglePostDetail'])->name('single.post.ad');

// Save Real Estate Post
Route::post('/save-real-estate-post', [AdController::class, 'saveRealEstatePost']);
Route::post('/save-bike-post', [AdController::class, 'saveBikePost']);
Route::post('/save-mobilePhone-post', [AdController::class, 'saveMobilePhonePost']);
// Save Mobile Accessory Post
Route::post('/save-mobileAccessory-post', [AdController::class, 'saveMobileAccessory']);
// Save Tablets Post
Route::post('/save-tablets-post', [AdController::class, 'saveTabletsPost']);
// Save Jobs Post
Route::post('/save-jobs-post', [AdController::class, 'saveJobsPost']);
