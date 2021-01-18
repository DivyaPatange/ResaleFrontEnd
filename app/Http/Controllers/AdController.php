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
use App\Models\Type;

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
            if($subCategory->sub_category == "Motorcycles")
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.bike', compact('subCategory', 'brand', 'state'));
            }
            if($subCategory->sub_category == "Bicycles")
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.bike', compact('subCategory', 'brand', 'state'));
            }
            if($subCategory->sub_category == "Mobile Phones")
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.mobilePhones', compact('subCategory', 'brand', 'state'));
            }
            if($subCategory->sub_category == "Accessories")
            {
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.mobileAccessory', compact('subCategory', 'type', 'state'));
            }
            if($subCategory->sub_category == "Tablets")
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.tablets', compact('subCategory', 'brand', 'state'));
            }
            if($subCategory->sub_category == "TV / LCD / LED Audio to Video")
            {
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.tv', compact('subCategory', 'type', 'state'));
            }
            if($subCategory->sub_category == "PG & Guest Houses")
            {
                $cities = City::where('status', 1)->get();
                return view('auth.realEstate', compact('subCategory', 'cities', 'state'));
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
        $carPost->car_varient = $request->car_varient;
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
        $carPost->colour = $request->colour;
        $carPost->insurance = $request->insurance;
        $carPost->sub_category_id = $request->sub_category_id;
        $carPost->save();
        return redirect()->route('single.post.ad', $carPost->id);
    }

    public function getSinglePostDetail($id)
    {
        $singlePost = Car::findorfail($id);
        return view('auth.product_detail', compact('singlePost'));
    }

    public function saveBikePost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'brand_name' => 'required',
            'year_of_registration' => 'required',
            'kms_driven' => 'required',
            'ad_title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photos' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'address' => 'required',
        ]);

        $bikePost = new Car();
        $bikePost->brand_id = $request->brand_name;
        $bikePost->year_of_registration = $request->year_of_registration;
        $bikePost->kms_driven = $request->kms_driven;
        $bikePost->ad_title = $request->ad_title;
        $bikePost->description = $request->description;
        $bikePost->price = $request->price;
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
        $bikePost->photos = implode(",", $files);
        $bikePost->state_id = $request->state;
        $bikePost->city_id = $request->city;
        $bikePost->pin_code = $request->pin_code;
        $bikePost->address = $request->address;
        $bikePost->user_id = $request->user_id;
        $bikePost->name = $request->name;
        $bikePost->email = $request->email;
        $bikePost->mobile_no = $request->mobile_no;
        $bikePost->sub_category_id = $request->sub_category_id;
        $bikePost->save();
        return redirect()->route('single.post.ad', $bikePost->id);
    }

    public function saveMobilePhonePost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'brand_name' => 'required',
            'model_name' => 'required',
            'year_of_purchase' => 'required',
            'physical_condition' => 'required',
            'ad_title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photos' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'address' => 'required',
        ]);
        $mobilePost = new Car();
        $mobilePost->brand_id = $request->brand_name;
        $mobilePost->model_id = $request->model_name;
        $mobilePost->year_of_registration = $request->year_of_purchase;
        $mobilePost->physical_condition = $request->physical_condition;
        $mobilePost->ad_title = $request->ad_title;
        $mobilePost->description = $request->description;
        $mobilePost->price = $request->price;
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
        $mobilePost->photos = implode(",", $files);
        $mobilePost->state_id = $request->state;
        $mobilePost->city_id = $request->city;
        $mobilePost->pin_code = $request->pin_code;
        $mobilePost->address = $request->address;
        $mobilePost->user_id = $request->user_id;
        $mobilePost->name = $request->name;
        $mobilePost->email = $request->email;
        $mobilePost->mobile_no = $request->mobile_no;
        $mobilePost->sub_category_id = $request->sub_category_id;
        $mobilePost->save();
        return redirect()->route('single.post.ad', $mobilePost->id);
    }

    public function saveMobileAccessory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'accessory_type' => 'required',
            'ad_title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photos' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'address' => 'required',
        ]);
        $mobileAccessory = new Car();
        $mobileAccessory->accessory_type = $request->accessory_type;
        $mobileAccessory->ad_title = $request->ad_title;
        $mobileAccessory->description = $request->description;
        $mobileAccessory->price = $request->price;
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
        $mobileAccessory->photos = implode(",", $files);
        $mobileAccessory->state_id = $request->state;
        $mobileAccessory->city_id = $request->city;
        $mobileAccessory->pin_code = $request->pin_code;
        $mobileAccessory->address = $request->address;
        $mobileAccessory->user_id = $request->user_id;
        $mobileAccessory->name = $request->name;
        $mobileAccessory->email = $request->email;
        $mobileAccessory->mobile_no = $request->mobile_no;
        $mobileAccessory->sub_category_id = $request->sub_category_id;
        $mobileAccessory->save();
        return redirect()->route('single.post.ad', $mobileAccessory->id);
    }

    public function saveTabletsPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'brand_name' => 'required',
            'year_of_purchase' => 'required',
            'physical_condition' => 'required',
            'ad_title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photos' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'address' => 'required',
        ]);
        $tablet = new Car();
        $tablet->brand_id = $request->brand_name;
        $tablet->year_of_registration = $request->year_of_purchase;
        $tablet->physical_condition = $request->physical_condition;
        $tablet->ad_title = $request->ad_title;
        $tablet->description = $request->description;
        $tablet->price = $request->price;
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
        $tablet->photos = implode(",", $files);
        $tablet->state_id = $request->state;
        $tablet->city_id = $request->city;
        $tablet->pin_code = $request->pin_code;
        $tablet->address = $request->address;
        $tablet->user_id = $request->user_id;
        $tablet->name = $request->name;
        $tablet->email = $request->email;
        $tablet->mobile_no = $request->mobile_no;
        $tablet->sub_category_id = $request->sub_category_id;
        $tablet->save();
        return redirect()->route('single.post.ad', $tablet->id);
    }
}
