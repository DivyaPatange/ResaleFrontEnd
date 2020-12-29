<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = "cars";

    protected $fillable = ['brand_id', 'model_id', 'varient', 'year_of_registration', 'fuel', 'transmission', 'km_driven', 'no_of_owners', 'ad_title', 'description', 'photos', 'state_id', 'city_id', 'location', 'user_id'];
}
