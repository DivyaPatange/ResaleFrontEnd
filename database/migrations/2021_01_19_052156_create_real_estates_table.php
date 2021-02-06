<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->string('property_type')->nullable();
            $table->string('property_for')->nullable();
            $table->string('property_location')->nullable();
            $table->string('bedroom')->nullable();
            $table->string('balcony')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('property_floor_no')->nullable();
            $table->string('no_of_floor')->nullable();
            $table->string('furnishing')->nullable();
            $table->string('super_build_up_area')->nullable();
            $table->string('carpet_area')->nullable();
            $table->string('build_up_area')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('possession_status')->nullable();
            $table->string('age_of_construction')->nullable();
            $table->string('available_from')->nullable();
            $table->string('total_price')->nullable();
            $table->string('price_per_sq_ft')->nullable();
            $table->string('price_include')->nullable();
            $table->string('booking_amount_charges')->nullable();
            $table->string('maintenance_charges')->nullable();
            $table->string('photos')->nullable();
            $table->string('ad_title')->nullable();
            $table->text('description')->nullable();
            $table->string('listed_by')->nullable();
            $table->string('rooms')->nullable();
            $table->string('facing')->nullable();
            $table->string('overlooking')->nullable();
            $table->string('car_parking')->nullable();
            $table->string('multiple_flat')->nullable();
            $table->string('area_registration_no')->nullable();
            $table->string('status_of_water')->nullable();
            $table->string('status_of_electricity')->nullable();
            $table->string('ownership_approval')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('flooring')->nullable();
            $table->string('aminities')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_no')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states');
            $table->unsignedInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedInteger('locality_id')->nullable();
            $table->foreign('locality_id')->references('id')->on('localities');
            $table->string('pin_code')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('real_estates');
    }
}
