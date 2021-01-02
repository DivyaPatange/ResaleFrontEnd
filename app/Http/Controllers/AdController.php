<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use Redirect;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ModelName;
use App\Models\State;
use App\Models\City;
use App\Models\Car;

class AdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        return view('auth.adByCategory');
    }

    public function postAdForm($id)
    {
        $subCategory = SubCategory::findorfail($id);
        $state = State::where('status', 1)->get();
        if($subCategory->status == 1)
        {
            if($subCategory->sub_category == "Cars")
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.postAdForm', compact('subCategory', 'brand', 'state'));
            }
            if($subCategory->sub_category == "Sedan")
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.postAdForm', compact('subCategory', 'brand', 'state'));
            }
            if($subCategory->sub_category == "Hatchbag")
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.postAdForm', compact('subCategory', 'brand', 'state'));
            }
            if($subCategory->sub_category == "SUV")
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.postAdForm', compact('subCategory', 'brand', 'state'));
            }
            if($subCategory->sub_category == "Mini Suv")
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.postAdForm', compact('subCategory', 'brand', 'state'));
            }
            if($subCategory->sub_category == "Traveller")
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.postAdForm', compact('subCategory', 'brand', 'state'));
            }
            if($subCategory->sub_category == "Scooters")
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.bike', compact('subCategory', 'brand', 'state'));
            }
        }
        else{
            return Redirect::back();
        }
        // dd($subCategory);
        
    }

    public function getModelList(Request $request)
    {
        $model = ModelName::where("brand_id", $request->brand_id)->where('status', 1)
        ->pluck("model_name","id");
        return response()->json($model);
    }

    public function getCityList(Request $request)
    {
        $city = City::where("state_id", $request->state_id)->where('status', 1)
        ->pluck("city_name","id");
        return response()->json($city);
    }

    public function saveCarPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'brand_name' => 'required',
            'model_name' => 'required',
            'year_of_registration' => 'required',
            'fuel_type' => 'required', 
            'transmission' => 'required',
            'kms_driven' => 'required',
            'no_of_owners' => 'required',
            'ad_title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photos' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'address' => 'required',
        ]);
        $carPost = new Car();
        $carPost->brand_id = $request->brand_name;
        $carPost->model_id = $request->model_name;
        $carPost->year_of_registration = $request->year_of_registration;
        $carPost->fuel_type = $request->fuel_type;
        $carPost->transmission = $request->transmission;
        $carPost->kms_driven = $request->kms_driven;
        $carPost->no_of_owners = $request->no_of_owners;
        $carPost->ad_title = $request->ad_title;
        $carPost->description = $request->description;
        $carPost->price = $request->price;
        // $files = $request->userfile;
        // dd($request->photos);
        if($request->hasfile('photos'))

         {

            foreach($request->file('photos') as $file)

            {

                $name = time().rand(1,100).'.'.$file->extension();

                $file->move(public_path('adPhotos'), $name);  

                $files[] = $name;  

            }
            // dd($files);

         }
        $carPost->photos = implode(",", $files);
        $carPost->state_id = $request->state;
        $carPost->city_id = $request->city;
        $carPost->pin_code = $request->pin_code;
        $carPost->address = $request->address;
        $carPost->user_id = $request->user_id;
        $carPost->name = $request->name;
        $carPost->email = $request->email;
        $carPost->mobile_no = $request->mobile_no;
        $carPost->sub_category_id = $request->sub_category_id;
        $carPost->save();
        return redirect()->route('single.post.ad', $carPost->id);
    }

    public function getSinglePostDetail($id)
    {
        $singlePost = Car::findorfail($id);
        return view('auth.product_detail', compact('singlePost'));
    }
}
