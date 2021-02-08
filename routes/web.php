<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\DesignController;

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
Route::get('/get-locality-list', [AdController::class, 'getLocalityList']);
Route::get('/get-brand-list', [AdController::class, 'getBrandList']);
Route::get('/get-car-varient-list', [AdController::class, 'getCarVarient']);

// Save Car Post
Route::post('/save-car-post', [AdController::class, 'saveCarPost']);
Route::get('/car-post-detail/{id}', [DesignController::class, 'getCarPostDetail'])->name('car.post.ad');
Route::get('/car-post', [DesignController::class, 'allCarPost'])->name('allCarPost');

// Save Real Estate Post
Route::post('/save-real-estate-post', [AdController::class, 'saveRealEstatePost']);

// Bike Route
Route::post('/save-bike-post', [AdController::class, 'saveBikePost']);
Route::get('/bike-detail/{id}', [DesignController::class, 'getBikePostDetail'])->name('bike.post.ad');
Route::post('/save-mobilePhone-post', [AdController::class, 'saveMobilePhonePost']);
Route::get('/mobile-phone-post-detail/{id}', [DesignController::class, 'getMobilePhonePostDetail'])->name('mobile-phone.post.ad');
Route::get('/mobile-phone-post', [DesignController::class, 'allMobilePhonePost'])->name('allMobilePhonePost');
// Save Mobile Accessory Post
Route::post('/save-mobileAccessory-post', [AdController::class, 'saveMobileAccessory']);
Route::get('/mobile-accessory-post', [DesignController::class, 'allMobileAccessoryPost'])->name('allMobileAccessoryPost');
Route::get('/mobile-accessory-post-detail/{id}', [DesignController::class, 'getMobileAccessoryPostDetail'])->name('mobile-accessory.post.ad');
// Save Tablets Post
Route::post('/save-tablets-post', [AdController::class, 'saveTabletsPost']);
Route::get('/tablets-post', [DesignController::class, 'allTabletsPost'])->name('allTabletsPost');
Route::get('/mobile-tablet-post-detail/{id}', [DesignController::class, 'getMobileTabletPostDetail'])->name('mobile-tablet.post.ad');
// Save Jobs Post
Route::post('/save-jobs-post', [AdController::class, 'saveJobsPost']);
Route::get('/job-post-detail/{id}', [DesignController::class, 'getJobPostDetail'])->name('job.post.ad');

// Spare Parts Route
Route::post('/save-spareParts-post', [AdController::class, 'saveSparePartsPost']);
Route::get('/spare-parts-post', [DesignController::class, 'allSparePartsPost'])->name('allSparePartsPost');
Route::get('/spare-parts-post-detail/{id}', [DesignController::class, 'getSparePartsPostDetail'])->name('spare-parts.post.ad');
// Electronics Route
Route::post('/save-tv-post', [AdController::class, 'saveTVPost']);
Route::get('/elctronic-appliances-post-detail/{id}', [DesignController::class, 'getElectronicAppliancesPostDetail'])->name('electronics.post.ad');
// Commercial Vehicle Post
Route::post('/save-commercialVehicle-post', [AdController::class, 'saveCommercialVehiclePost']);
Route::get('/commercial-vehicle-post-detail/{id}', [DesignController::class, 'getCommercialVehiclePostDetail'])->name('commercial-vehicle.post.ad');
Route::get('/commercial-vehicle-post', [DesignController::class, 'allCommercialVehiclePost'])->name('allCommercialVehiclePost');

// Furniture Route
Route::post('/save-furniture-post', [AdController::class, 'saveFurniturePost']);
Route::get('/furniture-post-detail/{id}', [DesignController::class, 'getFurniturePostDetail'])->name('furniture.post.ad');

// Sidebar Route
Route::get('/cars/{id}', [DesignController::class, 'carsDetails'])->name('sidebar.car.post');
Route::get('/jobs/{id}', [DesignController::class, 'jobsDetails'])->name('sidebar.job.post');
Route::get('/bikes/{id}', [DesignController::class, 'bikesDetails'])->name('sidebar.bike.post');
Route::get('/electronic-appliances/{id}', [DesignController::class, 'etcAppliancesDetails'])->name('sidebar.electronic.post');
Route::get('/furnitures/{id}', [DesignController::class, 'furnitureDetails'])->name('sidebar.furniture.post');
