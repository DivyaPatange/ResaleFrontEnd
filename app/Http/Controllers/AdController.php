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
use App\Models\PGHouse;
use DB;
use App\Models\PropertyRent;
use App\Models\PropertySale;
use App\Models\Education;
use App\Models\Fashion;
use App\Models\Pet;
use Image;

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
            if(($subCategory->sub_category == "Cars") || ($subCategory->sub_category == "Other Vehicles"))
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                $carVarient = DB::table('car_varients')->where('sub_category_id', $subCategory->id)->get();
                return view('auth.postAdForm', compact('subCategory', 'brand', 'state', 'carVarient', 'category'));
            }
            if($subCategory->sub_category == "Commercial Vehicles")
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.commercialVehicle', compact('subCategory', 'type', 'state', 'category', 'brand'));
            }
            if(($subCategory->sub_category == "Antiques - Handicrafts") || ($subCategory->sub_category == "Furniture for Hospitality") || ($subCategory->sub_category == "Furniture for Industry") || ($subCategory->sub_category == "Furniture for Shop & Showroom") || ($subCategory->sub_category == "Furniture for Office") || ($subCategory->sub_category == "Household Furniture") || ($subCategory->sub_category == "Kitchenware") || ($subCategory->sub_category == "Kids Furniture") || ($subCategory->sub_category == "Paintings") || ($subCategory->sub_category == "Home Decor & Gardening"))
            {
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.furniture', compact('subCategory', 'type', 'state', 'category'));
            }
            if(($subCategory->sub_category == "Motorcycles") || ($subCategory->sub_category == "Scooters") || ($subCategory->sub_category == "Bicycles"))
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.bike', compact('subCategory', 'brand', 'state', 'category'));
            }
            if(($subCategory->sub_category == "Spare Parts") || ($subCategory->sub_category == "Spare Parts - Accessories"))
            {
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.spareParts', compact('subCategory', 'type', 'state', 'category'));
            }
            if(($subCategory->sub_category == "Part time Jobs") || ($subCategory->sub_category == "Full Time Jobs") || ($subCategory->sub_category == "Internship") || ($subCategory->sub_category == "Freelancer") || ($subCategory->sub_category == "Work Abroad") || ($subCategory->sub_category == "Contract Jobs"))
            {
                $brand = Brand::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                return view('auth.jobs', compact('subCategory', 'brand', 'state', 'category'));
            }
            if(($subCategory->sub_category == "Mobile Phones") || ($subCategory->sub_category == "Apple"))
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
            if(($subCategory->sub_category == "Audio / Video / Gaming") || ($subCategory->sub_category == "Home Appliances") || ($subCategory->sub_category == "Computers / Laptops & Accessories") || 
            ($subCategory->sub_category == "Cameras / Lenses / Accessories") || ($subCategory->sub_category == "Kitchen Appliances") || ($subCategory->sub_category == "ACs & Cooler") || ($subCategory->sub_category == "Other Devices"))
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
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                $cities = City::where('status', 1)->get();
                return view('auth.propertyRent', compact('subCategory', 'cities', 'state', 'category', 'type'));
            }
            if($subCategory->sub_category == "Property for Sale")
            {
                $type = Type::where('sub_category_id', $subCategory->id)->where('status', 1)->get();
                $cities = City::where('status', 1)->get();
                return view('auth.propertySale', compact('subCategory', 'cities', 'state', 'category', 'type'));
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
            if(($subCategory->sub_category == "Entrance Exams Coaching") || ($subCategory->sub_category == "Baby Sitting - Creche") || ($subCategory->sub_category == "Competitive Exams Coaching") || ($subCategory->sub_category == "Distance Learning Education") || ($subCategory->sub_category == "Training & Certifications") || ($subCategory->sub_category == "Career Counseling") || ($subCategory->sub_category == "Hobbies") || ($subCategory->sub_category == "Schools &  Tuitions") || ($subCategory->sub_category == "Study in Abroad Consultants") || ($subCategory->sub_category == "Books & Study Material") || ($subCategory->sub_category == "Vocational Skills Training") || ($subCategory->sub_category == "Workshops"))
            {
                $cities = City::where('status', 1)->get();
                return view('auth.education', compact('subCategory', 'cities', 'state', 'category'));
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

    public function getSizeList(Request $request)
    {
        $size = DB::table('sizes')->where('type_id', $request->type_id)->where('status', 1)
        ->pluck("size", "id");
        return response()->json($size);
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

    public function getSubRoleList(Request $request)
    {
        $subRole = DB::table('sub_roles')->where('role_id', $request->role_id)->pluck("sub_role", "id");
        return response()->json($subRole);
    }

    public function getCarVarient(Request $request)
    {
        $carVarient = DB::table('car_varients')->where("model_id", $request->model_id)->where('sub_category_id', $request->sub_category_id)
        ->pluck("car_varient","id");
        return response()->json($carVarient);
    }

    public function getBrandList(Request $request)
    {
        $brand = DB::table('type_brands')->where('type_id', $request->type_id)->where('sub_category_id', $request->sub_category_id)->where('status', 1)
        ->pluck("type_brand_name", "id");
        return response()->json($brand);
    }

    public function getCommercialModelList(Request $request)
    {
        $model = DB::table('brand_models')->where('type_brand_id', $request->brand_id)->where('status', 1)
        ->pluck("model_name", "id");
        return response()->json($model);
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
            'user_type' => 'required',
            'insurance' => 'required',
            'body_type' => 'required',
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

                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);    

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
        $carPost->user_type = $request->user_type;
        $carPost->gst_no = $request->gst_no;
        $carPost->body_type = $request->body_type;
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
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save('adPhotos/'.$name);    
                $files[] = $name;  
            }
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
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);  
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
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);    
                $files[] = $name;  
            }
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
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);    

                $files[] = $name;  

            }
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

    public function saveEducationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'ad_title' => 'required',
            'description' => 'required',
            'fees' => 'required',
            'photos' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'address' => 'required',
            'education_stream' => 'required',
            'institute_name' => 'required',
            'institute_address' => 'required',
            'institute_website' => 'required',
        ]);
        $education = new Education();
        $education->ad_title = $request->ad_title;
        $education->description = $request->description;
        if($request->hasfile('photos'))
        {
            foreach($request->file('photos') as $file)
            {
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);  

                $files[] = $name;  
            }
        }
        $education->photos = implode(",", $files);
        $education->education_stream = $request->education_stream;
        $education->fees = $request->fees;
        $education->institute_name = $request->institute_name;
        $education->institute_address = $request->institute_address;
        $education->institute_website = $request->institute_website;
        $education->description = $request->description;
        $education->description = $request->description;
        $education->description = $request->description;
        $education->description = $request->description;
        $education->state_id = $request->state;
        $education->city_id = $request->city;
        $education->pin_code = $request->pin_code;
        $education->address = $request->address;
        $education->user_id = $request->user_id;
        $education->name = $request->name;
        $education->email = $request->email;
        $education->mobile_no = $request->mobile_no;
        $education->category_id = $request->category_id;
        $education->sub_category_id = $request->sub_category_id;
        $education->user_type = $request->user_type;
        $education->locality_id = $request->locality;
        $education->gst_no = $request->gst_no;
        $education->save();
        return Redirect::back()->with('success', 'Post Added Successfully!');
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
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);  

                $files[] = $name;  
            }
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
            'role' => 'required',
            'sub_role' => 'required',
            'salary_period' => 'required',
            'company_name' => 'required',
            'job_description' => 'required',
            'photos' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'address' => 'required',
        ]);
        // dd($request->job_type);
        $job = new Job();
        $job->job_title = $request->job_title;
        $job->sub_category_id = $request->job_type;
        $job->role_id = $request->role;
        $job->sub_role_id = implode(",", $request->sub_role);
        $job->salary_period = $request->salary_period;
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
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);  

                $files[] = $name;  
            }
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
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);    

                $files[] = $name;  
            }
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

                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);  

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
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);    

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

    public function saveFashionPost(Request $request)
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
        $fashion = new Fashion();
        $fashion->type_id = $request->clothing_type;
        $fashion->size = $request->size;
        $fashion->condition = $request->condition;
        $fashion->age = $request->age;
        $fashion->ad_title = $request->ad_title;
        $fashion->description = $request->description;
        $fashion->price = $request->price;
        // $files = $request->userfile;
        // dd($request->photos);
        if($request->hasfile('photos'))

         {

            foreach($request->file('photos') as $file)

            {
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);  

                $files[] = $name;  

            }
            // dd($files);
            
            $fashion->photos = implode(",", $files);
        }
        $fashion->state_id = $request->state;
        $fashion->city_id = $request->city;
        $fashion->pin_code = $request->pin_code;
        $fashion->address = $request->address;
        $fashion->user_id = $request->user_id;
        $fashion->name = $request->name;
        $fashion->email = $request->email;
        $fashion->mobile_no = $request->mobile_no;
        $fashion->category_id = $request->category_id;
        $fashion->sub_category_id = $request->sub_category_id;
        $fashion->locality_id = $request->locality;
        $fashion->user_type = $request->user_type;
        $fashion->gst_no = $request->gst_no;
        $fashion->save();
        return redirect()->route('furniture.post.ad', $furniture->id)->with('success', 'Post Added Successfully!');
    }

    public function savePetPost(Request $request)
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
        $pet = new Pet();
        $pet->type_id = $request->pet_type;
        $pet->ad_title = $request->ad_title;
        $pet->description = $request->description;
        $pet->price = $request->price;
        // $files = $request->userfile;
        // dd($request->photos);
        if($request->hasfile('photos'))

         {

            foreach($request->file('photos') as $file)

            {
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);  
                $files[] = $name;  

            }
            // dd($files);
            
            $pet->photos = implode(",", $files);
        }
        $pet->state_id = $request->state;
        $pet->city_id = $request->city;
        $pet->pin_code = $request->pin_code;
        $pet->address = $request->address;
        $pet->user_id = $request->user_id;
        $pet->name = $request->name;
        $pet->email = $request->email;
        $pet->mobile_no = $request->mobile_no;
        $pet->category_id = $request->category_id;
        $pet->sub_category_id = $request->sub_category_id;
        $pet->locality_id = $request->locality;
        $pet->user_type = $request->user_type;
        $pet->gst_no = $request->gst_no;
        $pet->save();
        return Redirect::back()->with('success', 'Post Added Successfully!');
    }

    public function savePGHousePost(Request $request)
    {
        $pgPost = new PGHouse();
        $pgPost->locality = $request->locality;
        $pgPost->address = $request->address;
        $pgPost->pin_code = $request->pincode;
        $pgPost->landmark = $request->landmark;
        $pgPost->pg_operational_since = $request->pg_operational_since;
        $pgPost->pg_present_in = $request->pg_present_in;
        $pgPost->pg_name = $request->pg_name;
        $pgPost->ad_posted_by = $request->ad_posted_by;
        $pgPost->rooms_categories = implode(",",$request->rooms_categories);
        $pgPost->no_of_single_sharing_room = $request->no_single_sharing_room;
        $pgPost->mo_rent_p_bed_single = $request->monthly_single_rent;
        $pgPost->security_deposit_single = $request->deposit_single;
        $pgPost->no_of_double_sharing_room = $request->no_twin_sharing_room;
        $pgPost->mo_rent_p_bed_double = $request->monthly_twin_rent;
        $pgPost->security_deposit_double = $request->deposit_twin;
        $pgPost->no_of_triple_sharing_room = $request->no_triple_sharing_room;
        $pgPost->mo_rent_p_bed_triple = $request->monthly_triple_rent;
        $pgPost->security_deposit_triple = $request->deposit_triple;
        $pgPost->no_of_four_sharing_room = $request->no_four_sharing_room;
        $pgPost->mo_rent_p_bed_four = $request->monthly_four_rent;
        $pgPost->security_deposit_four = $request->deposit_four;
        $pgPost->no_of_other_sharing_room = $request->no_other_sharing_room;
        $pgPost->mo_rent_p_bed_other = $request->monthly_other_rent;
        $pgPost->security_deposit_other = $request->deposit_other;
        $pgPost->room_facility = implode(",", $request->room_facility);
        $pgPost->preferred_gender = $request->gender;
        $pgPost->tenent_preference = $request->tenent_preference;
        $pgPost->pg_rules = implode(",", $request->rules);
        $pgPost->notice_period = $request->notice_period;
        $pgPost->gate_closing_time = $request->gate_closed_time;
        $pgPost->available_services = implode(",", $request->services);
        $pgPost->food_provided = $request->food_type;
        $pgPost->amenities = implode(",", $request->amenities);
        $pgPost->parking_availability = $request->parking;
        $pgPost->pg_description = $request->pg_description;
        if($request->hasfile('photos'))

         {

            foreach($request->file('photos') as $file)

            {
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);  

                $files[] = $name;  

            }
            // dd($files);

         }
        $pgPost->photos = implode(",", $files);
        $pgPost->user_id = $request->user_id;
        $pgPost->category_id = $request->category_id;
        $pgPost->sub_category_id = $request->sub_category_id;
        $pgPost->save();
        return Redirect::back()->with('success', 'Post Added Successfully!');
    }

    public function searchCity(Request $request)
    {
        if($request->ajax()) {
            // select country name from database
            $data = City::where('city_name', 'LIKE', $request->keyword.'%')->get();

            $output = '';
            if (count($data)>0) {
                $output .= '<ul id="country-list">';
                foreach ($data as $row){
                    $output .= '<li onclick="selectCountry(\''.$row->city_name.'\');">'.$row->city_name.'</li>';
                }
                $output .= '</ul>';
            }
            return $output;
        }
    }

    public function searchLocality(Request $request)
    {
        if($request->ajax()) {
            // select country name from database
            $city = DB::table('cities')->where('city_name', $request->city)->first();
            if(!empty($city)){
                $data = DB::table('localities')->where('city_id', $city->id)->where('locality', 'LIKE', $request->keyword.'%')->get();
    
                $output = '';
                if (count($data)>0) {
                    $output .= '<ul id="country-list">';
                    foreach ($data as $row){
                        $output .= '<li onclick="selectLocality(\''.$row->locality.'\');">'.$row->locality.'</li>';
                    }
                    $output .= '</ul>';
                }
                return $output;
            }
        }
    }

    public function savePropertyRentPost(Request $request)
    {
        // dd($request->add_room);
        $propRent = new PropertyRent();
        $propRent->user_id = $request->user_id;
        $propRent->category_id = $request->category_id;
        $propRent->sub_category_id = $request->sub_category_id;
        $propRent->type_id = $request->property_type;
        $propRent->city = $request->city;
        $propRent->locality = $request->locality;
        $propRent->address = $request->address;
        // dd($request->project_name);
        $propRent->project_name = $request->project_name;
        $propRent->bedroom = $request->bedroom;
        $propRent->balcony = $request->balcony;
        $propRent->bathroom = $request->bathroom;
        $propRent->property_floor_no = $request->property_floor_no;
        $propRent->total_floor = $request->total_floor;
        $propRent->furnished_status = $request->furnishing;
        $propRent->super_area = $request->super_build_up_area;
        $propRent->super_unit = $request->super_area_unit;
        $propRent->carpet_area = $request->carpet_area;
        $propRent->carpet_unit = $request->carpet_unit;
        $propRent->build_area = $request->build_up_area;
        $propRent->build_unit = $request->build_unit;
        $propRent->available_from = $request->available_from;
        $propRent->available_date = $request->available_date;
        $propRent->age_of_construction = $request->age_of_construction;
        $propRent->monthly_rent = $request->monthly_rent;
        $propRent->rent_as = $request->show_rent_as;
        $propRent->other_charges = $request->other_charges;
        $propRent->elec_water_charges = $request->ele_water_charges;
        $propRent->security_amount = $request->security_amount;
        $propRent->maintenance_charges = $request->maintenance_charge;
        $propRent->charges_per = $request->m_charges_per;
        $propRent->brokerages = $request->brokerage;
        // dd($request->exterior_photos);
        if($request->hasfile('exterior_photos'))

         {

            foreach($request->file('exterior_photos') as $file)

            {
                // $image = $file;
                // dd($image);
                // $name = time().rand(1,100).'.'.$file->extension();
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);

                // $file->move(public_path('adPhotos'), $name);  

                $files[] = $name;  

            }
            // dd($files);
            $propRent->exterior_photos = implode(",", $files);
         }
         
         if($request->hasfile('living_photos'))

         {

            foreach($request->file('living_photos') as $file1)

            {

                $name1 = time().'.'.$file1->getClientOriginalExtension();
                $image_resize1 = Image::make($file1->getRealPath());
                $image_resize1->resize(400, null, function ($constraint1) {
                    $constraint1->aspectRatio();
                });

                $image_resize1->save('adPhotos/'.$name1);

                $files1[] = $name1;  

            }
            // dd($files);
         $propRent->living_room_photos = implode(",", $files1);

         }
         if($request->hasfile('bedroom_photos'))

         {

            foreach($request->file('bedroom_photos') as $file2)

            {

                $name2 = time().'.'.$file2->getClientOriginalExtension();
                $image_resize2 = Image::make($file2->getRealPath());
                $image_resize2->resize(400, null, function ($constraint2) {
                    $constraint2->aspectRatio();
                });

                $image_resize2->save('adPhotos/'.$name2);

                $files2[] = $name2;  

            }
            // dd($files);
         $propRent->bedroom_photos = implode(",", $files2);

         }

         if($request->hasfile('bathroom_photos'))

         {

            foreach($request->file('bathroom_photos') as $file3)
            {

                $name3 = time().'.'.$file3->getClientOriginalExtension();
                $image_resize3 = Image::make($file3->getRealPath());
                $image_resize3->resize(400, null, function ($constraint3) {
                    $constraint3->aspectRatio();
                });

                $image_resize3->save('adPhotos/'.$name3);  

                $files3[] = $name3;  

            }
            // dd($files);
         $propRent->bathroom_photos = implode(",", $files3);

         }

         if($request->hasfile('kitchen_photos'))

         {

            foreach($request->file('kitchen_photos') as $file4)
            {
                $name4 = time().'.'.$file4->getClientOriginalExtension();
                $image_resize4 = Image::make($file4->getRealPath());
                $image_resize4->resize(400, null, function ($constraint4) {
                    $constraint4->aspectRatio();
                });

                $image_resize4->save('adPhotos/'.$name4);  

                $files4[] = $name4;  

            }
            // dd($files);
         $propRent->kitchen_photos = implode(",", $files4);

         }
         $propRent->tenants_bachelor = $request->tenants_bachelor;
         $propRent->tenants_non_veg = $request->tenants_non_veg;
         $propRent->tenants_pets = $request->tenants_pets;
         $propRent->tenants_company_lease = $request->tenants_company_lease;
         if($request->add_room){
            $propRent->add_rooms = implode(",", $request->add_room);
         }
         $propRent->facing = $request->facing;
         if($request->overlooking)
         {
            $propRent->overlooking = implode(",", $request->overlooking);
         }
         if($request->car_parking)
         {
            $propRent->car_parking = implode(",", $request->car_parking);
         }
         $propRent->lifts_in_tower = $request->lift_in_tower;
         $propRent->mul_unit_available = $request->mul_unit_avail;
         $propRent->water_status = $request->status_of_water;
         $propRent->electricity_status = $request->status_of_electricity;
         if($request->flooring)
         {
            $propRent->flooring = implode(",", $request->flooring);
         }
         if($request->aminities)
         {
            $propRent->aminities = implode(",", $request->aminities);
         }
         $propRent->description = $request->description;
         $propRent->landmark = $request->landmark;
         $propRent->owner_resides = $request->owner_resides;
         $propRent->land_zone = $request->land_zone;
         if($request->ideal_business){
            $propRent->ideal_business = implode(",", $request->ideal_business);
         }
         $propRent->will_to_modify_interior = $request->modify_interior;
         $propRent->lock_in_period = $request->lock_period;
         $propRent->personal_washroom = $request->personal_washroom;
         $propRent->pantry = $request->pantry_cafe;
         $propRent->currently_rent_out = $request->rent_out;
         $propRent->office_on_floor = $request->office_floor;
         $propRent->building_class = $request->building_class;
         $propRent->leed_certification = $request->leed_certification;
         $propRent->corner_showroom = $request->corner_showroom;
         $propRent->main_road_facing = $request->main_road_facing;
         $propRent->entrance_width = $request->entrance_width;
         $propRent->entrance_width_unit = $request->entrance_unit;
         $propRent->width_facing_road = $request->facing_width;
         $propRent->width_facing_road_unit = $request->width_facing_road_unit;
         $propRent->floor_constru = $request->floor_constru;
         $propRent->no_open_side = $request->no_of_open_side;
         $propRent->wt_road_facing_plot = $request->width_of_road;
         $propRent->any_construction = $request->any_construc;
         $propRent->boundry_wall = $request->boundry_wall;
         $propRent->plot_area = $request->plot_area;
         $propRent->plot_unit = $request->plot_unit;
         $propRent->plot_length = $request->plot_length;
         $propRent->plot_width = $request->plot_width;
         $propRent->corner_plot = $request->corner_plot;
         $propRent->stamp_duty = $request->stamp_duty;
         $propRent->booking_token_amount = $request->booking_token_amount;
         if($request->hasfile('master_photos'))
        {
            foreach($request->file('master_photos') as $file6)
            {
                $name6 = time().'.'.$file6->getClientOriginalExtension();
                $image_resize6 = Image::make($file6->getRealPath());
                $image_resize6->resize(400, null, function ($constraint6) {
                    $constraint6->aspectRatio();
                });

                $image_resize6->save('adPhotos/'.$name6);  
                $files6[] = $name6;  
            }
            $propRent->master_photos = implode(",", $files6);
        }
        if($request->hasfile('location_photos'))
        {
            foreach($request->file('location_photos') as $file7)
            {
                $name7 = time().'.'.$file7->getClientOriginalExtension();
                $image_resize7 = Image::make($file7->getRealPath());
                $image_resize7->resize(400, null, function ($constraint7) {
                    $constraint7->aspectRatio();
                });

                $image_resize7->save('adPhotos/'.$name7);    
                $files7[] = $name7;  
            }
            $propRent->location_photos = implode(",", $files7);
        }
        if($request->hasfile('others_photos'))
        {
            foreach($request->file('others_photos') as $file8)
            {
                $name8 = time().'.'.$file8->getClientOriginalExtension();
                $image_resize8 = Image::make($file8->getRealPath());
                $image_resize8->resize(400, null, function ($constraint8) {
                    $constraint8->aspectRatio();
                });

                $image_resize8->save('adPhotos/'.$name8);   
                $files8[] = $name8;  
            }
            $propRent->others_photos = implode(",", $files8);
        }
        if($request->hasfile('site_photos'))
        {
            foreach($request->file('site_photos') as $file9)
            {
                $name9 = time().'.'.$file9->getClientOriginalExtension();
                $image_resize9 = Image::make($file9->getRealPath());
                $image_resize9->resize(400, null, function ($constraint9) {
                    $constraint9->aspectRatio();
                });

                $image_resize9->save('adPhotos/'.$name9);  
                $files9[] = $name9;  
            }
            $propRent->site_photos = implode(",", $files9);
        }
        $propRent->ownership_approval = $request->ownership_approval;
        $propRent->approved_by = $request->approved_by;
        $propRent->listed_by = $request->listed_by;
         $propRent->save();
         return Redirect::back()->with('success', 'Post Added Successfully');
    }

    public function savePropertySale(Request $request)
    {
        // dd($request->all());
        $propSale = new PropertySale();
        $propSale->category_id = $request->category_id;
        $propSale->sub_category_id = $request->sub_category_id;
        $propSale->user_id = $request->user_id;
        $propSale->type_id = $request->property_type;
        $propSale->city = $request->city;
        $propSale->locality = $request->locality;
        $propSale->address = $request->address;
        $propSale->project_name = $request->project_name;
        $propSale->bedroom = $request->bedroom;
        $propSale->balcony = $request->balcony;
        $propSale->bathroom = $request->bathroom;
        $propSale->floor_no = $request->floor_no;
        $propSale->total_floor = $request->total_floor;
        $propSale->furnishing = $request->furnishing;
        $propSale->super_area = $request->super_build_up_area;
        $propSale->super_area_unit = $request->super_area_unit;
        $propSale->carpet_area = $request->carpet_area;
        $propSale->carpet_unit = $request->carpet_unit;
        $propSale->build_up_area = $request->build_up_area;
        $propSale->build_unit = $request->build_unit;
        $propSale->transaction_type = $request->transaction_type;
        $propSale->possess_status = $request->posses_status;
        $propSale->available_from = $request->available_from;
        $propSale->age_of_construction = $request->age_of_construction;
        $propSale->total_price = $request->total_price;
        $propSale->price_per_sq_ft = $request->price_per_sq_ft;
        $propSale->show_price_as = $request->show_price_as;
        if($request->price_include)
        {
            $propSale->price_include = implode(",", $request->price_include);
        }
        $propSale->booking_token_amt = $request->booking_token_amount;
        $propSale->maintenance_charges = $request->maintenance_charges;
        if($request->add_room)
        {
            $propSale->add_rooms = implode(",", $request->add_room);
        }
        $propSale->facing = $request->facing;
        if($request->overlooking)
        {
            $propSale->overlooking = implode(",", $request->overlooking);
        }
        $propSale->car_parking = $request->car_parking;
        $propSale->mul_flat_avail = $request->mul_flat_available;
        $propSale->rera_registr_no = $request->rera_regis_no;
        $propSale->status_of_water = $request->status_of_water;
        $propSale->status_of_electricity = $request->status_of_electricity;
        if($request->flooring)
        {
            $propSale->flooring = implode(",", $request->flooring);
        }
        if($request->aminities)
        {
            $propSale->aminities = implode(",", $request->aminities);
        }
        $propSale->ownership_approval = $request->ownership_approval;
        $propSale->approved_by = $request->approved_by;
        $propSale->description = $request->description;
        $propSale->landmark = $request->land_mark;
        $propSale->listed_by = $request->listed_by;
        if($request->hasfile('exterior_photos'))
        {
            foreach($request->file('exterior_photos') as $file)
            {
                $name = time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image_resize->save('adPhotos/'.$name);  
                $files[] = $name;  
            }
            $propSale->exterior_photos = implode(",", $files);
        }
        if($request->hasfile('living_photos'))
        {
            foreach($request->file('living_photos') as $file1)
            {
                $name1 = time().'.'.$file1->getClientOriginalExtension();
                $image_resize1 = Image::make($file1->getRealPath());
                $image_resize1->resize(400, null, function ($constraint1) {
                    $constraint1->aspectRatio();
                });

                $image_resize1->save('adPhotos/'.$name1);    
                $files1[] = $name1;  
            }
            $propSale->living_photos = implode(",", $files1);
        }
        if($request->hasfile('bedroom_photos'))
        {
            foreach($request->file('bedroom_photos') as $file2)
            {
                $name2 = time().'.'.$file2->getClientOriginalExtension();
                $image_resize2 = Image::make($file2->getRealPath());
                $image_resize2->resize(400, null, function ($constraint2) {
                    $constraint2->aspectRatio();
                });

                $image_resize2->save('adPhotos/'.$name2);  
                $files2[] = $name2;  
            }
            $propSale->bedroom_photos = implode(",", $files2);
        }
        if($request->hasfile('bathroom_photos'))
        {
            foreach($request->file('bathroom_photos') as $file3)
            {
                $name3 = time().'.'.$file3->getClientOriginalExtension();
                $image_resize3 = Image::make($file3->getRealPath());
                $image_resize3->resize(400, null, function ($constraint3) {
                    $constraint3->aspectRatio();
                });

                $image_resize3->save('adPhotos/'.$name3);  
                $files3[] = $name3;  
            }
            $propSale->bathroom_photos = implode(",", $files3);
        }
        if($request->hasfile('kitchen_photos'))
        {
            foreach($request->file('kitchen_photos') as $file4)
            {
                $name4 = time().'.'.$file4->getClientOriginalExtension();
                $image_resize4 = Image::make($file4->getRealPath());
                $image_resize4->resize(400, null, function ($constraint4) {
                    $constraint4->aspectRatio();
                });

                $image_resize4->save('adPhotos/'.$name4);  
                $files4[] = $name4;  
            }
            $propSale->kitchen_photos = implode(",", $files4);
        }
        if($request->hasfile('common_photos'))
        {
            foreach($request->file('common_photos') as $file5)
            {
                $name5 = time().'.'.$file5->getClientOriginalExtension();
                $image_resize5 = Image::make($file5->getRealPath());
                $image_resize5->resize(400, null, function ($constraint5) {
                    $constraint5->aspectRatio();
                });

                $image_resize5->save('adPhotos/'.$name5);
                $files5[] = $name5;  
            }
            $propSale->common_photos = implode(",", $files5);
        }
        if($request->hasfile('master_photos'))
        {
            foreach($request->file('master_photos') as $file6)
            {
                $name6 = time().'.'.$file6->getClientOriginalExtension();
                $image_resize6 = Image::make($file6->getRealPath());
                $image_resize6->resize(400, null, function ($constraint6) {
                    $constraint6->aspectRatio();
                });

                $image_resize6->save('adPhotos/'.$name6);
                $files6[] = $name6;  
            }
            $propSale->master_photos = implode(",", $files6);
        }
        if($request->hasfile('location_photos'))
        {
            foreach($request->file('location_photos') as $file7)
            {
                $name7 = time().'.'.$file7->getClientOriginalExtension();
                $image_resize7 = Image::make($file7->getRealPath());
                $image_resize7->resize(400, null, function ($constraint7) {
                    $constraint7->aspectRatio();
                });

                $image_resize7->save('adPhotos/'.$name7); 
                $files7[] = $name7;  
            }
            $propSale->location_photos = implode(",", $files7);
        }
        if($request->hasfile('others_photos'))
        {
            foreach($request->file('others_photos') as $file8)
            {
                $name8 = time().'.'.$file8->getClientOriginalExtension();
                $image_resize8 = Image::make($file8->getRealPath());
                $image_resize8->resize(400, null, function ($constraint8) {
                    $constraint8->aspectRatio();
                });

                $image_resize8->save('adPhotos/'.$name8); 
                $files8[] = $name8;  
            }
            $propSale->others_photos = implode(",", $files8);
        }
        if($request->hasfile('site_photos'))
        {
            foreach($request->file('site_photos') as $file9)
            {
                $name9 = time().'.'.$file9->getClientOriginalExtension();
                $image_resize9 = Image::make($file9->getRealPath());
                $image_resize9->resize(400, null, function ($constraint9) {
                    $constraint9->aspectRatio();
                });

                $image_resize9->save('adPhotos/'.$name9);  
                $files9[] = $name9;  
            }
            $propSale->site_photos = implode(",", $files9);
        }
        $propSale->rera_id = $request->rera_id;
        $propSale->land_zone = $request->land_zone;
        $propSale->ideal_business = $request->ideal_business;
        $propSale->metro_station_name = $request->metro_station;
        $propSale->prop_dist_metro = $request->distance_metro;
        $propSale->railway_station_name = $request->railway_station;
        $propSale->prop_dist_rly = $request->distance_railway;
        $propSale->bus_stand_name = $request->bus_stand;
        $propSale->prop_dist_bus = $request->distance_bus;
        $propSale->airport_name = $request->airport;
        $propSale->prop_dist_airport = $request->distance_airport;
        $propSale->shopping_mall_name = $request->shopping_mall;
        $propSale->prop_dist_mall = $request->distance_mall;
        $propSale->office_name = $request->office_complex;
        $propSale->prop_dist_office = $request->distance_office;
        $propSale->personal_washroom = $request->personal_washroom;
        $propSale->pantry_cafe = $request->pantry_cafe;
        $propSale->covered_area = $request->covered_area;
        $propSale->covered_unit = $request->covered_unit;
        $propSale->plot_area = $request->plot_area;
        $propSale->plot_unit = $request->plot_unit;
        $propSale->current_lease_out = $request->lease_out;
        $propSale->assured_return = $request->assure_return;
        $propSale->other_charges = $request->other_charges;
        $propSale->stamp_duty = $request->stamp_duty;
        $propSale->m_charges_per = $request->m_charges_per;
        $propSale->brokerage = $request->brokerage;
        $propSale->lift_in_tower = $request->lift_in_tower;
        $propSale->office_floor = $request->office_floor;
        $propSale->mul_unit_avail = $request->mul_unit_avail;
        $propSale->building_class = $request->building_class;
        $propSale->leed_certificate = $request->leed_certification;
        $propSale->no_open_side = $request->no_of_open_side;
        $propSale->wt_road_facing_plot = $request->width_of_road;
        $propSale->any_construction = $request->any_construc;
        $propSale->boundry_wall = $request->boundry_wall;
        $propSale->plot_length = $request->plot_length;
        $propSale->plot_width = $request->plot_width;
        $propSale->corner_plot = $request->corner_plot;
        $propSale->main_road_facing = $request->main_road;
        $propSale->entrance_width = $request->entrance_width;
        $propSale->entrance_unit = $request->entrance_unit;
        $propSale->land_length = $request->land_length;
        $propSale->l_length_unit = $request->land_length_unit;
        $propSale->land_breadth = $request->land_breadth;
        $propSale->l_breadth_unit = $request->land_breadth_unit;
        $propSale->save();
        return Redirect::back()->with('success', 'Post Added Successfully!');

    }

    public function myAds()
    {
        return view('auth.my-ads');
    }

    public function flatApartmentForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.flat-apartment', compact('cities', 'state'));
    }

    public function studioApartmentRentForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.studio-apartment', compact('cities', 'state'));
    }

    public function residentialHouseForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.residential-house', compact('cities', 'state'));
    }

    public function comOfficeForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.com-office', compact('cities', 'state'));
    }

    public function itOfficeForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.it-office', compact('cities', 'state'));
    }

    public function comLandForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.com-land', compact('cities', 'state'));
    }

    public function warehouseGodownForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.warehouse-godown', compact('cities', 'state'));
    }

    public function comShowroomForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.com-showroom', compact('cities', 'state'));
    }

    public function comShopForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.com-shop', compact('cities', 'state'));
    }

    public function industrialLandForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.industrial-land', compact('cities', 'state'));
    }

    public function industrialBuildingForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.industrial-building', compact('cities', 'state'));
    }

    public function industrialShedForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.industrial-shed', compact('cities', 'state'));
    }

    public function agriculturalLandForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.agricultural-land', compact('cities', 'state'));
    }

    public function farmHouseLandForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.farmHouse-land', compact('cities', 'state'));
    }

    public function farmHouseRentForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertyRent.farmHouse', compact('cities', 'state'));
    }

    public function flatSaleForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.flat-apartment', compact('cities', 'state'));
    }

    public function residentialPenthouseForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.residential-penthouse', compact('cities', 'state'));
    }

    public function residentialLandForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.residential-land', compact('cities', 'state'));
    }

    public function builderApartmentForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.builder-apartment', compact('cities', 'state'));
    }

    public function residentialVillaForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.residential-villa', compact('cities', 'state'));
    }

    public function residentialHouseSaleForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.residential-house', compact('cities', 'state'));
    }

    public function studioApartmentForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.studio-apartment', compact('cities', 'state'));
    }

    public function comOfficeSpaceForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.comOffice-space', compact('cities', 'state'));
    }

    public function itOfficeSezForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.it-office-sez', compact('cities', 'state'));
    }

    public function comShopSaleForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.com-shop', compact('cities', 'state'));
    }

    public function comShowroomSaleForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.com-showroom', compact('cities', 'state'));
    }

    public function comLandSaleForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.com-land', compact('cities', 'state'));
    }

    public function warehouseGodownSaleForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.warehouse-godown', compact('cities', 'state'));
    }

    public function industrialLandSaleForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.industrial-land', compact('cities', 'state'));
    }

    public function industrialBuildingSaleForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.industrial-building', compact('cities', 'state'));
    }

    public function industrialShedSaleForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.industrial-shed', compact('cities', 'state'));
    }

    public function agriculturalLandSaleForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.agri-land', compact('cities', 'state'));
    }

    public function layoutLandSaleForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.layout-land', compact('cities', 'state'));
    }

    public function farmHouseLandSaleForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.farmHouse-land', compact('cities', 'state'));
    }

    public function farmHouseSaleForm()
    {
        $cities = City::where('status', 1)->get();
        $state = State::where('status', 1)->get();
        return view('auth.propertySale.farm-house', compact('cities', 'state'));
    }
}
