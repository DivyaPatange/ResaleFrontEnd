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
Route::get('about', function(){
    return view('auth.about');
});
Route::get('contact', function(){
    return view('auth.contact');
});

Route::get('career', function(){
    return view('auth.career');
});

Route::get('video', function(){
    return view('auth.video');
});

Route::get('advertise', function(){
    return view('auth.advertise');
});

Route::get('blog', function(){
    return view('auth.blog');
});

Route::get('featured', function(){
    return view('auth.featured');
});

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

Route::get('/commercial-shop', function(){
    return view('auth.commercial_office');
});
Route::get('/commercial-showroom', function(){
    return view('auth.commercial_showroom');
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

Route::get('/my-ads', [AdController::class, 'myAds'])->name('my-ad');
Auth::routes();

Route::get('/flat-apartment-form', [AdController::class, 'flatApartmentForm']);
Route::get('/studio-apartment-rent-form', [AdController::class, 'studioApartmentRentForm']);
Route::get('/residential-house-form', [AdController::class, 'residentialHouseForm']);
Route::get('/com-office-form', [AdController::class, 'comOfficeForm']);
Route::get('/it-office-form', [AdController::class, 'itOfficeForm']);
Route::get('/com-land-form', [AdController::class, 'comLandForm']);
Route::get('/warehouse-godown-form', [AdController::class, 'warehouseGodownForm']);
Route::get('/com-shop-form', [AdController::class, 'comShopForm']);
Route::get('/com-showroom-form', [AdController::class, 'comShowroomForm']);
Route::get('/industrial-land-form', [AdController::class, 'industrialLandForm']);
Route::get('/industrial-building-form', [AdController::class, 'industrialBuildingForm']);
Route::get('/industrial-shed-form', [AdController::class, 'industrialShedForm']);
Route::get('/agricultural-land-form', [AdController::class, 'agriculturalLandForm']);
Route::get('/farmHouse-land-form', [AdController::class, 'farmHouseLandForm']);
Route::get('/farmHouse-rent-form', [AdController::class, 'farmHouseRentForm']);

Route::get('/flat-sale-form', [AdController::class, 'flatSaleForm']);
Route::get('/residential-penthouse-form', [AdController::class, 'residentialPenthouseForm']);
Route::get('/residential-land-form', [AdController::class, 'residentialLandForm']);
Route::get('/builder-apartment-form', [AdController::class, 'builderApartmentForm']);
Route::get('/residential-villa-form', [AdController::class, 'residentialVillaForm']);
Route::get('/residential-house-sale-form', [AdController::class, 'residentialHouseSaleForm']);
Route::get('/studio-apartment-form', [AdController::class, 'studioApartmentForm']);
Route::get('/com-office-space-form', [AdController::class, 'comOfficeSpaceForm']);
Route::get('/it-office-sez-form', [AdController::class, 'itOfficeSezForm']);
Route::get('/com-shop-sale-form', [AdController::class, 'comShopSaleForm']);
Route::get('/com-showroom-sale-form', [AdController::class, 'comShowroomSaleForm']);
Route::get('/com-land-sale-form', [AdController::class, 'comLandSaleForm']);
Route::get('/warehouse-godown-sale-form', [AdController::class, 'warehouseGodownSaleForm']);
Route::get('/industrial-land-sale-form', [AdController::class, 'industrialLandSaleForm']);
Route::get('/industrial-building-sale-form', [AdController::class, 'industrialBuildingSaleForm']);
Route::get('/industrial-shed-sale-form', [AdController::class, 'industrialShedSaleForm']);
Route::get('/agricultural-land-sale-form', [AdController::class, 'agriculturalLandSaleForm']);
Route::get('/layout-land-sale-form', [AdController::class, 'layoutLandSaleForm']);
Route::get('/farmHouse-land-sale-form', [AdController::class, 'farmHouseLandSaleForm']);
Route::get('/farm-house-sale-form', [AdController::class, 'farmHouseSaleForm']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
Route::post('/submitMobileNo', [MobileController::class, 'save'])->name('mobileNo.submit');
Route::post('/otpSubmit', [MobileController::class, 'otpSave'])->name('otp.save');
Route::get('/post-ad', [AdController::class, 'index'])->name('post-ad');
Route::get('/post-ad-form/{id}', [AdController::class, 'postAdForm'])->name('post-ad-form');
Route::get('/searchCity', [AdController::class, 'searchCity'])->name('searchCity');
Route::get('/searchLocality', [AdController::class, 'searchLocality'])->name('searchLocality');

// Ajax Route
Route::get('/get-model-list', [AdController::class, 'getModelList']);
Route::get('/get-city-list', [AdController::class, 'getCityList']);
Route::get('/get-locality-list', [AdController::class, 'getLocalityList']);
Route::get('/get-subrole-list', [AdController::class, 'getSubRoleList']);
Route::get('/get-brand-list', [AdController::class, 'getBrandList']);
Route::get('/get-size-list', [AdController::class, 'getSizeList']);
Route::get('/get-commercial-model-list', [AdController::class, 'getCommercialModelList']);
Route::get('/get-car-varient-list', [AdController::class, 'getCarVarient']);

// Save Car Post
Route::post('/save-car-post', [AdController::class, 'saveCarPost']);
Route::get('/car-post-detail/{id}', [DesignController::class, 'getCarPostDetail'])->name('car.post.ad');
Route::get('/car-post', [DesignController::class, 'allCarPost'])->name('allCarPost');

// Save Real Estate Post
Route::post('/save-real-estate-post', [AdController::class, 'saveRealEstatePost']);
Route::post('/save-property-sale-post', [AdController::class, 'savePropertySale']);
Route::get('/property-sale-post-detail/{id}', [DesignController::class, 'getPropertySalePostDetail'])->name('property-sale.post.ad');

// Save Education Post
Route::post('/save-education-post', [AdController::class, 'saveEducationPost']);
Route::get('/education-post-detail/{id}', [DesignController::class, 'getEducationPostDetail'])->name('education.post.ad');

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

// Pet Route
Route::post('/save-pet-post', [AdController::class, 'savePetPost']);
Route::get('/pet-post-detail/{id}', [DesignController::class, 'getPetPostDetail'])->name('pet.post.ad');

// PG Guest House
Route::post('/save-pg-guest-house', [AdController::class, 'savePGHousePost']);

Route::post('/save-fashion-post', [AdController::class, 'saveFashionPost']);
Route::get('/fashion-post-detail/{id}', [DesignController::class, 'getFashionPostDetail'])->name('fashion.post.ad');

// Property Rent Post 
Route::post('/save-property-rent-post', [AdController::class, 'savePropertyRentPost']);
Route::get('/property-rent-post-detail/{id}', [DesignController::class, 'getPropertyRentPostDetail'])->name('property-rent.post.ad');

// Sidebar Route
Route::get('/cars/{id}', [DesignController::class, 'carsDetails'])->name('sidebar.car.post');
Route::get('/jobs/{id}', [DesignController::class, 'jobsDetails'])->name('sidebar.job.post');
Route::get('/bikes/{id}', [DesignController::class, 'bikesDetails'])->name('sidebar.bike.post');
Route::get('/electronic-appliances/{id}', [DesignController::class, 'etcAppliancesDetails'])->name('sidebar.electronic.post');
Route::get('/furnitures/{id}', [DesignController::class, 'furnitureDetails'])->name('sidebar.furniture.post');
Route::get('/fashions/{id}', [DesignController::class, 'fashionDetails'])->name('sidebar.fashion.post');
Route::get('/education/{id}', [DesignController::class, 'educationDetails'])->name('sidebar.education.post');
Route::get('/pets/{id}', [DesignController::class, 'petDetails'])->name('sidebar.pet.post');
Route::get('/property-rent/{id}', [DesignController::class, 'propertyRentDetails'])->name('sidebar.property-rent.post');
Route::get('/property-sale/{id}', [DesignController::class, 'propertySaleDetails'])->name('sidebar.property-sale.post');
