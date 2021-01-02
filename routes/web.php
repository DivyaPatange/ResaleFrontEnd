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

Route::get('/', function () {
    return view('auth.dashboard');
})->name('dashboard');
Route::get('/product_detail', function () {
    return view('auth.product_detail');
});
Route::get('/postAdForm1', function () {
    return view('auth.postAdForm1');
});
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
Route::get('/get-model-list', [AdController::class, 'getModelList']);
Route::get('/get-city-list', [AdController::class, 'getCityList']);
Route::post('/save-car-post', [AdController::class, 'saveCarPost']);
Route::get('/single-post-detail/{id}', [AdController::class, 'getSinglePostDetail'])->name('single.post.ad');