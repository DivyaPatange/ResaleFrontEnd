<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    use HasFactory;

    protected $table = "real_estates";

    protected $fillable = ['user_id', 'sub_category_id', 'property_type', 'property_for', 'property_location', 'bedroom', 'balcony', 'bathroom',
    'property_floor_no', 'no_of_floor', 'furnishing', 'super_build_up_area', 'carpet_area', 'build_up_area', 'transaction_type', 'possession_status',
    'age_of_construction', 'available_from', 'total_price', 'price_per_sq_ft', 'price_include', 'booking_amount_charges', 'maintenance_charges', 
    'photos', 'ad_title', 'description', 'listed_by', 'rooms', 'facing', 'overlooking', 'car_parking', 'multiple_flat', 'area_registration_no', 'status_of_water',
    'status_of_electricity', 'ownership_approval', 'approved_by', 'flooring', 'aminities', 'name', 'email', 'mobile_no', 'state_id', 'city_id', 'locality_id', 'pin_code', 'address'];
}
