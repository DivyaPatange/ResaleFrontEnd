<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CommercialVehicle;
use App\Models\MobilePhone;
use App\Models\MobileAccessory;
use App\Models\MobileTablet;
use App\Models\SubCategory;
use App\Models\Job;
use App\Models\Bike;
use App\Models\SparePart;
use App\Models\TV;
use App\Models\Furniture;
use App\Models\Fashion;
use App\Models\Education;
use App\Models\Pet;

class DesignController extends Controller
{
    public function getCarPostDetail($id)
    {
        $singlePost = Car::findorfail($id);
        return view('auth.product_detail', compact('singlePost'));
    }

    public function allCarPost()
    {
        $carPost = Car::orderBy('id', 'DESC')->get();
        return view('auth.allCarPost', compact('carPost'));
    }

    public function getCommercialVehiclePostDetail($id)
    {
        $singlePost = CommercialVehicle::findorfail($id);
        return view('auth.commercialVehicle_detail', compact('singlePost'));
    }

    public function allCommercialVehiclePost()
    {
        $commercialVehiclePost = CommercialVehicle::orderBy('id', 'DESC')->get();
        return view('auth.allCVPost', compact('commercialVehiclePost'));
    }

    public function getMobilePhonePostDetail($id)
    {
        $singlePost = MobilePhone::findorfail($id);
        return view('auth.mobilePhone_detail', compact('singlePost'));
    }

    public function allMobilePhonePost()
    {
        $mobilePhonePost = MobilePhone::orderBy('id', 'DESC')->get();
        return view('auth.allMobilePhonePost', compact('mobilePhonePost'));
    }

    public function carsDetails($id)
    {
        $carPost = Car::where('sub_category_id', $id)->orderBy('id', 'DESC')->get();
        return view('auth.allCarPost', compact('carPost'));
    }

    public function allMobileAccessoryPost()
    {
        $mobileAccessory = MobileAccessory::orderBy('id', 'DESC')->get();
        return view('auth.allMobileAccessory', compact('mobileAccessory'));
    }

    public function getMobileAccessoryPostDetail($id)
    {
        $singlePost = MobileAccessory::findorfail($id);
        return view('auth.mobileAccessory_detail', compact('singlePost')); 
    }

    public function allTabletsPost()
    {
        $tablets = MobileTablet::orderBy('id', 'DESC')->get();
        return view('auth.allTablets', compact('tablets'));
    }

    public function getMobileTabletPostDetail($id)
    {
        $singlePost = MobileTablet::findorfail($id);
        return view('auth.tablet_detail', compact('singlePost')); 
    }

    public function jobsDetails($id)
    {
        $subCategory = SubCategory::findorfail($id);
        $jobs = Job::where('sub_category_id', $id)->orderBy('id', 'DESC')->get();
        return view('auth.allJob', compact('jobs', 'subCategory'));
    }

    public function getJobPostDetail($id)
    {
        $singlePost = Job::findorfail($id);
        return view('auth.job_detail', compact('singlePost'));
    }

    public function bikesDetails($id)
    {
        $subCategory = SubCategory::findorfail($id);
        $bikes = Bike::where('sub_category_id', $id)->orderBy('id', 'DESC')->get();
        return view('auth.allBike', compact('bikes', 'subCategory'));
    }

    public function getBikePostDetail($id)
    {
        $singlePost = Bike::findorfail($id);
        return view('auth.bike_detail', compact('singlePost'));
    }

    public function allSparePartsPost()
    {
        $spareParts = SparePart::orderBy('id', 'DESC')->get();
        return view('auth.allSpareParts', compact('spareParts'));
    }

    public function getSparePartsPostDetail($id)
    {
        $singlePost = SparePart::findorfail($id);
        return view('auth.spare_part_detail', compact('singlePost'));
    }

    public function etcAppliancesDetails($id)
    {
        $subCategory = SubCategory::findorfail($id);
        $electronics = TV::orderBy('id', 'DESC')->get();
        return view('auth.allElectronics', compact('subCategory', 'electronics'));
    }

    public function getElectronicAppliancesPostDetail($id)
    {
        $singlePost = TV::findorfail($id);
        return view('auth.electronic_detail', compact('singlePost'));
    }

    public function furnitureDetails($id)
    {
        $subCategory = SubCategory::findorfail($id);
        $furnitures = Furniture::where('sub_category_id', $subCategory->id)->orderBy('id', 'DESC')->get();
        return view('auth.allFurniture', compact('subCategory', 'furnitures'));
    }

    public function getFurniturePostDetail($id)
    {
        $singlePost = Furniture::findorfail($id);
        return view('auth.furniture_detail', compact('singlePost'));
    }

    public function fashionDetails($id)
    {
        $subCategory = SubCategory::findorfail($id);
        $fashions = Fashion::where('sub_category_id', $subCategory->id)->orderBy('id', 'DESC')->get();
        return view('auth.allFashion', compact('subCategory', 'fashions'));
    }

    public function getFashionPostDetail($id)
    {
        $singlePost = Fashion::findorfail($id);
        return view('auth.fashion_detail', compact('singlePost'));
    }

    public function educationDetails($id)
    {
        $subCategory = SubCategory::findorfail($id);
        $educations = Education::where('sub_category_id', $subCategory->id)->orderBy('id', 'DESC')->get();
        return view('auth.allEducation', compact('subCategory', 'educations'));
    }

    public function getEducationPostDetail($id)
    {
        $singlePost = Education::findorfail($id);
        return view('auth.education_detail', compact('singlePost'));
    }

    public function petDetails($id)
    {
        $subCategory = SubCategory::findorfail($id);
        $pets = Pet::where('sub_category_id', $subCategory->id)->orderBy('id', 'DESC')->get();
        return view('auth.allPet', compact('subCategory', 'pets'));
    }

    public function getPetPostDetail($id)
    {
        $singlePost = Pet::findorfail($id);
        return view('auth.pet_detail', compact('singlePost'));
    }
}
