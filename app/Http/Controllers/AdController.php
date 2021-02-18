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
use App\Models\RealEstate;
use App\Models\MobilePhone;
use App\Models\MobileTablet;
use App\Models\MobileAccessory;
use App\Models\Job;
use App\Models\Bike;
use App\Models\SparePart;
use App\Models\TV;
use App\Models\CommercialVehicle;
use App\Models\Furniture;
use DB;

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
        $category = Category::where('id', $subCategory->category_id)->where('status', 1)->first();
        if($subCategory->status == 1)
        {
            if(($subCategory->sub_category == "Cars") || ($subCategory->sub_category == "Other Vehicles") || ($subCategory->sub_category == "Spare Parts - Accessories"))
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                $carVarient = DB::table('car_varients')->where('sub_category_id', $subCategory->id)->get();
                return view('auth.postAdForm', compact('subCategory', 'brand', 'state', 'carVarient', 'category'));
            }
            if($subCategory->sub_category == "Commercial Vehicles")
            {
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.commercialVehicle', compact('subCategory', 'type', 'state', 'category'));
            }
            if(($subCategory->sub_category == "Sofa & Dining") || ($subCategory->sub_category == "Beds & Wordrobes") || ($subCategory->sub_category == "Home Decor & Gardening") || ($subCategory->sub_category == "Kids Furniture") || ($subCategory->sub_category == "Other House Hold Items"))
            {
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.furniture', compact('subCategory', 'type', 'state', 'category'));
            }
            if(($subCategory->sub_category == "Motorcycles") || ($subCategory->sub_category == "Scooters") || ($subCategory->sub_category == "Bicycles"))
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.bike', compact('subCategory', 'brand', 'state', 'category'));
            }
            if($subCategory->sub_category == "Spare Parts")
            {
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.spareParts', compact('subCategory', 'type', 'state', 'category'));
            }
            if(($subCategory->sub_category == "Sales & Marketing") || ($subCategory->sub_category == "Data Entry & Back Office Executive"))
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.jobs', compact('subCategory', 'brand', 'state', 'category'));
            }
            if($subCategory->sub_category == "Mobile Phones")
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.mobilePhones', compact('subCategory', 'brand', 'state', 'category'));
            }
            if($subCategory->sub_category == "Accessories")
            {
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.mobileAccessory', compact('subCategory', 'type', 'state', 'category'));
            }
            if($subCategory->sub_category == "Tablets")
            {
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.tablets', compact('subCategory', 'type', 'state', 'category'));
            }
            if(($subCategory->sub_category == "TV / LCD / LED Audio to Video") || ($subCategory->sub_category == "Kitchen & Home Appliances") || ($subCategory->sub_category == "Computers & Laptops") || 
                ($subCategory->sub_category == "Cameras & Lenses") || ($subCategory->sub_category == "Games & Entertainment") || ($subCategory->sub_category == "Fridge") || ($subCategory->sub_category == "Computer Accessories") || 
                ($subCategory->sub_category == "Hard Disk, Printer & Monitor") || ($subCategory->sub_category == "ACs & Cooler") || ($subCategory->sub_category == "Washing Machine"))
            {
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.tv', compact('subCategory', 'type', 'state', 'category'));
            }
            // dd($subCategory);
            // if(($subCategory->sub_category == "Property for Rent / Lease") || ($subCategory->sub_category == "Property for Sale"))
            // {
            //     $cities = City::where('status', 1)->get();
            //     return view('auth.realEstate', compact('subCategory', 'cities', 'state', 'category'));
            // }
            if($subCategory->sub_category == "PG & Guest Houses")
            {
                $cities = City::where('status', 1)->get();
                return view('auth.pgGuest', compact('subCategory', 'cities', 'state', 'category'));
            }
            if($subCategory->sub_category == "Property for Rent / Lease")
            {
                $cities = City::where('status', 1)->get();
                return view('auth.rent-lease', compact('subCategory', 'cities', 'state', 'category'));
            }
            if(($subCategory->sub_category == "Men") || ($subCategory->sub_category == "Women") || ($subCategory->sub_category == "Kids"))
            {
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                $cities = City::where('status', 1)->get();
                return view('auth.men', compact('subCategory', 'cities', 'state', 'category', 'type'));
            }
            if(($subCategory->sub_category == "Pet Clinics") || ($subCategory->sub_category == "Fishes & Aquarium") || ($subCategory->sub_category == "Pet Food") || ($subCategory->sub_category == "Pet Accessories") || ($subCategory->sub_category == "Other Pets") || ($subCategory->sub_category == "Pet Training & Grooming"))
            {
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                $cities = City::where('status', 1)->get();
                return view('auth.pet', compact('subCategory', 'cities', 'state', 'category', 'type'));
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

    public function getLocalityList(Request $request)
    {
        $locality = DB::table('localities')->where("city_id", $request->city_id)
        ->pluck("locality","id");
        return response()->json($locality);
    }

    public function getCarVarient(Request $request)
    {
        $carVarient = DB::table('car_varients')->where("model_id", $request->model_id)
        ->pluck("car_varient","id");
        return response()->json($carVarient);
    }

    public function getBrandList(Request $request)
    {
        $brand = DB::table('type_brands')->where('type_id', $request->type_id)->where('status', 1)
        ->pluck("type_brand_name", "id");
        return response()->json($brand);
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
        $carPost->locality_id = $request->locality;
        $carPost->category_id = $request->category_id;
        $carPost->sub_category_id = $request->sub_category_id;
        $carPost->save();
        return redirect()->route('car.post.ad', $carPost->id)->with('success', 'Car Post Added Successfully!');
    }

    public function saveRealEstatePost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile_no' => 'required',
            'state' => 'required',
            'city' => 'required',
            // 'locality' => 'required',
            'pin_code' => 'required',
            'address' => 'required',
            'property_type' => 'required',
            'property_for' => 'required',
            'property_location' => 'required',
            'total_price' => 'required',
            'price_per_sq_ft' => 'required',
            'photos' => 'required',
            'ad_title' => 'required',
            'description' => 'required',
        ]);
        $realEstate = new RealEstate();
        $realEstate->property_type = $request->property_type;
        $realEstate->property_for = $request->property_for;
        $realEstate->property_location = $request->property_location;
        $realEstate->bedroom = $request->bedroom;
        $realEstate->balcony = $request->balcony;
        $realEstate->bathroom = $request->bathroom;
        $realEstate->property_floor_no = $request->property_floor_no;
        $realEstate->no_of_floor = $request->no_of_floor;
        $realEstate->furnishing = $request->furnishing;
        $realEstate->super_build_up_area = $request->super_build_up_area;
        $realEstate->carpet_area = $request->carpet_area;
        $realEstate->build_up_area = $request->build_up_area;
        $realEstate->transaction_type = $request->transaction_type;
        $realEstate->possession_status = $request->possession_status;
        $realEstate->age_of_construction = $request->age_of_construction;
        $realEstate->available_from = $request->available_from;
        $realEstate->total_price = $request->total_price;
        $realEstate->price_per_sq_ft = $request->price_per_sq_ft;
        $realEstate->price_include = $request->price_include;
        $realEstate->booking_amount_charges = $request->booking_amount_charges;
        $realEstate->maintenance_charges = $request->maintenance_charges;
        $realEstate->ad_title = $request->ad_title;
        $realEstate->description = $request->description;
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
        $realEstate->photos = implode(",", $files);
        $realEstate->listed_by = $request->listed_by;
        $realEstate->rooms = $request->rooms;
        $realEstate->facing = $request->facing;
        $realEstate->overlooking = $request->overlooking;
        $realEstate->car_parking = $request->car_parking;
        $realEstate->multiple_flat = $request->multiple_flat;
        $realEstate->area_registration_no = $request->area_registration_no;
        $realEstate->status_of_water = $request->status_of_water;
        $realEstate->status_of_electricity = $request->status_of_electricity;
        $realEstate->ownership_approval = $request->ownership_approval;
        $realEstate->approved_by = $request->approved_by;
        $realEstate->flooring = $request->flooring;
        $realEstate->aminities = $request->aminities;
        $realEstate->state_id = $request->state;
        $realEstate->city_id = $request->city;
        $realEstate->locality_id = $request->locality;
        $realEstate->pin_code = $request->pin_code;
        $realEstate->address = $request->address;
        $realEstate->user_id = $request->user_id;
        $realEstate->name = $request->name;
        $realEstate->email = $request->email;
        $realEstate->mobile_no = $request->mobile_no;
        $realEstate->category_id = $request->category_id;
        $realEstate->sub_category_id = $request->sub_category_id;
        $realEstate->save();
        return Redirect::back()->with('success', 'Properties Post Added Successfully!');
    }


    public function saveBikePost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'brand_name' => 'required',
            // 'model_name' => 'required',
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

        $bikePost = new Bike();
        $bikePost->brand_id = $request->brand_name;
        $bikePost->model_id = $request->model_name;
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
        $bikePost->locality_id = $request->locality;
        $bikePost->pin_code = $request->pin_code;
        $bikePost->address = $request->address;
        $bikePost->user_id = $request->user_id;
        $bikePost->name = $request->name;
        $bikePost->email = $request->email;
        $bikePost->mobile_no = $request->mobile_no;
        $bikePost->category_id = $request->category_id;
        $bikePost->sub_category_id = $request->sub_category_id;
        $bikePost->save();
        return redirect()->route('bike.post.ad', $bikePost->id)->with('success', 'Post Added Successfully!');
    }

    public function saveCommercialVehiclePost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'vehicle_type' => 'required',
            'brand_name' => 'required',
            // 'model_name' => 'required',
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

        $vehicle = new CommercialVehicle();
        $vehicle->type_id = $request->vehicle_type;
        $vehicle->type_brand_id = $request->brand_name;
        $vehicle->year_of_registration = $request->year_of_registration;
        $vehicle->kms_driven = $request->kms_driven;
        $vehicle->ad_title = $request->ad_title;
        $vehicle->description = $request->description;
        $vehicle->price = $request->price;
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
        $vehicle->photos = implode(",", $files);
        $vehicle->state_id = $request->state;
        $vehicle->city_id = $request->city;
        $vehicle->locality_id = $request->locality;
        $vehicle->pin_code = $request->pin_code;
        $vehicle->address = $request->address;
        $vehicle->user_id = $request->user_id;
        $vehicle->name = $request->name;
        $vehicle->email = $request->email;
        $vehicle->mobile_no = $request->mobile_no;
        $vehicle->category_id = $request->category_id;
        $vehicle->sub_category_id = $request->sub_category_id;
        $vehicle->user_type = $request->user_type;
        $vehicle->gst_no = $request->gst_no;
        $vehicle->save();
        return redirect()->route('commercial-vehicle.post.ad', $vehicle->id)->with('success', 'Post Added Successfully!');
    }

    public function saveMobilePhonePost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'brand_name' => 'required',
            // 'model_name' => 'required',
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
        $mobilePost = new MobilePhone();
        $mobilePost->brand_id = $request->brand_name;
        $mobilePost->model_id = $request->model_name;
        $mobilePost->year_of_purchase = $request->year_of_purchase;
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
        $mobilePost->locality_id = $request->locality;
        $mobilePost->pin_code = $request->pin_code;
        $mobilePost->address = $request->address;
        $mobilePost->user_id = $request->user_id;
        $mobilePost->name = $request->name;
        $mobilePost->email = $request->email;
        $mobilePost->mobile_no = $request->mobile_no;
        $mobilePost->category_id = $request->category_id;
        $mobilePost->sub_category_id = $request->sub_category_id;
        $mobilePost->user_type = $request->user_type;
        $mobilePost->firm_name = $request->first_name;
        $mobilePost->gst_no = $request->gst_no;
        $mobilePost->invoice = $request->invoice;
        $mobilePost->additional_accessory = $request->additional_accessory;
        $mobilePost->damages_and_functional_issues = $request->damages_and_functional_issues;
        $mobilePost->save();
        return redirect()->route('mobile-phone.post.ad', $mobilePost->id)->with('success', 'Mobile Phone Post Added Successfully!');
    }

    public function saveMobileAccessory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'accessory_type' => 'required',
            // 'brand_name' => 'required',
            'condition' => 'required',
            'ad_title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photos' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'address' => 'required',
        ]);
        $mobileAccessory = new MobileAccessory();
        $mobileAccessory->type_id = $request->accessory_type;
        $mobileAccessory->type_brand_id = $request->brand_name;
        $mobileAccessory->condition = $request->condition;
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
        $mobileAccessory->locality_id = $request->locality;
        $mobileAccessory->address = $request->address;
        $mobileAccessory->user_id = $request->user_id;
        $mobileAccessory->name = $request->name;
        $mobileAccessory->email = $request->email;
        $mobileAccessory->mobile_no = $request->mobile_no;
        $mobileAccessory->category_id = $request->category_id;
        $mobileAccessory->sub_category_id = $request->sub_category_id;
        $mobileAccessory->user_type = $request->user_type;
        $mobileAccessory->gst_no = $request->gst_no;
        $mobileAccessory->save();
        return redirect()->route('mobile-accessory.post.ad', $mobileAccessory->id)->with('success', 'Mobile Accessory Post Added Successfully!');
    }

    public function saveTabletsPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'type_name' => 'required',
            'brand_name' => 'required',
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
        $tablet = new MobileTablet();
        $tablet->type_id = $request->type_name;
        $tablet->type_brand_id = $request->brand_name;
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
        $tablet->category_id = $request->category_id;
        $tablet->sub_category_id = $request->sub_category_id;
        $tablet->user_type = $request->user_type;
        $tablet->gst_no = $request->gst_no;
        $tablet->save();
        return redirect()->route('mobile-tablet.post.ad', $tablet->id)->with('success', 'Tablet Post Added Successfully!');
    }

    public function saveJobsPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'job_title' => 'required',
            'job_type' => 'required',
            'salary_period' => 'required',
            'company_name' => 'required',
            'job_description' => 'required',
            'photos' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'address' => 'required',
        ]);
        $job = new Job();
        $job->job_title = $request->job_title;
        $job->job_type = $request->job_type;
        $job->salary_period = $request->salary_period;
        $job->position = $request->position;
        $job->min_monthly_salary = $request->min_monthly_salary;
        $job->max_monthly_salary = $request->max_monthly_salary;
        $job->min_experience = $request->min_experience; 
        $job->max_experience = $request->max_experience;  
        $job->company_name = $request->company_name;
        $job->job_description = $request->job_description;
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
        $job->photos = implode(",", $files);
        $job->state_id = $request->state;
        $job->city_id = $request->city;
        $job->pin_code = $request->pin_code;
        $job->address = $request->address;
        $job->user_id = $request->user_id;
        $job->name = $request->name;
        $job->email = $request->email;
        $job->mobile_no = $request->mobile_no;
        $job->category_id = $request->category_id;
        $job->sub_category_id = $request->sub_category_id;
        $job->save();
        return redirect()->route('job.post.ad', $job->id)->with('success', 'Job Post Added Successfully!');
    }    
    
    public function saveSparePartsPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'product_type' => 'required',
            'ad_title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photos' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'address' => 'required',
        ]);
        $sparePart = new SparePart();
        $sparePart->type_id = $request->product_type;
        $sparePart->ad_title = $request->ad_title;
        $sparePart->description = $request->description;
        $sparePart->price = $request->price;
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
        $sparePart->photos = implode(",", $files);
        $sparePart->state_id = $request->state;
        $sparePart->city_id = $request->city;
        $sparePart->pin_code = $request->pin_code;
        $sparePart->address = $request->address;
        $sparePart->user_id = $request->user_id;
        $sparePart->name = $request->name;
        $sparePart->email = $request->email;
        $sparePart->mobile_no = $request->mobile_no;
        $sparePart->category_id = $request->category_id;
        $sparePart->sub_category_id = $request->sub_category_id;
        $sparePart->locality_id = $request->locality;
        $sparePart->save();
        return redirect()->route('spare-parts.post.ad', $sparePart->id)->with('success', 'Post Added Successfully!');
    }

    public function saveTVPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'product_type' => 'required',
            'ad_title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photos' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'address' => 'required',
        ]);
        $tv = new TV();
        $tv->type_id = $request->product_type;
        $tv->type_brand_id = $request->brand_name;
        $tv->condition = $request->condition;
        $tv->ad_title = $request->ad_title;
        $tv->description = $request->description;
        $tv->price = $request->price;
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
        $tv->photos = implode(",", $files);
        $tv->state_id = $request->state;
        $tv->city_id = $request->city;
        $tv->pin_code = $request->pin_code;
        $tv->address = $request->address;
        $tv->user_id = $request->user_id;
        $tv->name = $request->name;
        $tv->email = $request->email;
        $tv->mobile_no = $request->mobile_no;
        $tv->category_id = $request->category_id;
        $tv->sub_category_id = $request->sub_category_id;
        $tv->locality_id = $request->locality;
        $tv->user_type = $request->user_type;
        $tv->gst_no = $request->gst_no;
        $tv->save();
        return redirect()->route('electronics.post.ad', $tv->id)->with('success', 'Post Added Successfully!');
    }

    public function saveFurniturePost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            // 'furniture_type' => 'required',
            // 'brand_name' => 'required',
            'ad_title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photos' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'address' => 'required',
        ]);
        $furniture = new Furniture();
        $furniture->type_id = $request->furniture_type;
        $furniture->type_brand_id = $request->brand_name;
        $furniture->condition = $request->condition;
        $furniture->age = $request->age;
        $furniture->ad_title = $request->ad_title;
        $furniture->description = $request->description;
        $furniture->price = $request->price;
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
        $furniture->photos = implode(",", $files);
        $furniture->state_id = $request->state;
        $furniture->city_id = $request->city;
        $furniture->pin_code = $request->pin_code;
        $furniture->address = $request->address;
        $furniture->user_id = $request->user_id;
        $furniture->name = $request->name;
        $furniture->email = $request->email;
        $furniture->mobile_no = $request->mobile_no;
        $furniture->category_id = $request->category_id;
        $furniture->sub_category_id = $request->sub_category_id;
        $furniture->locality_id = $request->locality;
        $furniture->user_type = $request->user_type;
        $furniture->gst_no = $request->gst_no;
        $furniture->save();
        return redirect()->route('furniture.post.ad', $furniture->id)->with('success', 'Post Added Successfully!');
    }
}
