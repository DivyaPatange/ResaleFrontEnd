<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_rents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->string('city')->nullable();
            $table->string('locality')->nullable();
            $table->string('address')->nullable();
            $table->string('project_name')->nullable();
            $table->string('bedroom')->nullable();
            $table->string('balcony')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('property_floor_no')->nullable();
            $table->string('total_floor')->nullable();
            $table->string('furnished_status')->nullable();
            $table->string('super_area')->nullable();
            $table->string('super_unit')->nullable();
            $table->string('carpet_area')->nullable();
            $table->string('carpet_unit')->nullable();
            $table->string('build_area')->nullable();
            $table->string('build_unit')->nullable();
            $table->string('available_from')->nullable();
            $table->date('available_date')->nullable();
            $table->string('age_of_construction')->nullable();
            $table->string('monthly_rent')->nullable();
            $table->string('rent_as')->nullable();
            $table->string('other_charges')->nullable();
            $table->string('elec_water_charges')->nullable();
            $table->string('security_amount')->nullable();
            $table->string('maintenance_charges')->nullable();
            $table->string('charges_per')->nullable();
            $table->string('brokerages')->nullable();
            $table->string('exterior_photos')->nullable();
            $table->string('living_room_photos')->nullable();
            $table->string('bedroom_photos')->nullable();
            $table->string('bathroom_photos')->nullable();
            $table->string('kitchen_photos')->nullable();
            $table->string('tenants_bachelor')->nullable();
            $table->string('tenants_non_veg')->nullable();
            $table->string('tenants_pets')->nullable();
            $table->string('tenants_company_lease')->nullable();
            $table->string('add_rooms')->nullable();
            $table->string('facing')->nullable();
            $table->string('overlooking')->nullable();
            $table->string('car_parking')->nullable();
            $table->string('lifts_in_tower')->nullable();
            $table->string('mul_unit_available')->nullable();
            $table->string('water_status')->nullable();
            $table->string('electricity_status')->nullable();
            $table->string('flooring')->nullable();
            $table->string('aminities')->nullable();
            $table->text('description')->nullable();
            $table->string('landmark')->nullable();
            $table->string('owner_resides')->nullable();
            $table->string('land_zone')->nullable();
            $table->string('metro_station_name')->nullable();
            $table->string('prop_dist_metro')->nullable();
            $table->string('railway_station_name')->nullable();
            $table->string('prop_dist_rly')->nullable();
            $table->string('bus_stand_name')->nullable();
            $table->string('prop_dist_bus')->nullable();
            $table->string('airport_name')->nullable();
            $table->string('prop_dist_airport')->nullable();
            $table->string('shopping_mall_name')->nullable();
            $table->string('prop_dist_mall')->nullable();
            $table->string('office_name')->nullable();
            $table->string('prop_dist_office')->nullable();
            $table->string('ideal_business')->nullable();
            $table->string('will_to_modify_interior')->nullable();
            $table->string('lock_in_period')->nullable();
            $table->string('personal_washroom')->nullable();
            $table->string('pantry')->nullable();
            $table->string('currently_rent_out')->nullable();
            $table->string('office_on_floor')->nullable();
            $table->string('building_class')->nullable();
            $table->string('leed_certification')->nullable();
            $table->string('corner_showroom')->nullable();
            $table->string('main_road_facing')->nullable();
            $table->string('entrance_width')->nullable();
            $table->string('entrance_width_unit')->nullable();
            $table->string('width_facing_road')->nullable();
            $table->string('width_facing_road_unit')->nullable();
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
        Schema::dropIfExists('property_rents');
    }
}
