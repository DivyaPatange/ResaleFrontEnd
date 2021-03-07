<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertySalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_sales', function (Blueprint $table) {
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
            $table->text('project_name')->nullable();
            $table->string('bedroom')->nullable();
            $table->string('balcony')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('floor_no')->nullable();
            $table->string('total_floor')->nullable();
            $table->string('furnishing')->nullable();
            $table->string('super_area')->nullable();
            $table->string('super_area_unit')->nullable();
            $table->string('carpet_area')->nullable();
            $table->string('carpet_unit')->nullable();
            $table->string('build_up_area')->nullable();
            $table->string('build_unit')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('possess_status')->nullable();
            $table->string('available_from')->nullable();
            $table->string('age_of_construction')->nullable();
            $table->string('total_price')->nullable();
            $table->string('price_per_sq_ft')->nullable();
            $table->string('price_include')->nullable();
            $table->string('booking_token_amt')->nullable();
            $table->string('maintenance_charges')->nullable();
            $table->text('exterior_photos')->nullable();
            $table->text('living_photos')->nullable();
            $table->text('bedroom_photos')->nullable();
            $table->text('bathroom_photos')->nullable();
            $table->text('kitchen_photos')->nullable();
            $table->string('add_rooms')->nullable();
            $table->string('facing')->nullable();
            $table->string('overlooking')->nullable();
            $table->string('car_parking')->nullable();
            $table->string('mul_flat_avail')->nullable();
            $table->string('rera_registr_no')->nullable();
            $table->string('status_of_water')->nullable();
            $table->string('status_of_electricity')->nullable();
            $table->string('flooring')->nullable();
            $table->string('aminities')->nullable();
            $table->string('ownership_approval')->nullable();
            $table->string('approved_by')->nullable();
            $table->text('description')->nullable();
            $table->text('landmark')->nullable();
            $table->string('listed_by')->nullable();
            $table->string('rera_id')->nullable();
            $table->string('land_zone')->nullable();
            $table->string('ideal_business')->nullable();
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
            $table->string('personal_washroom')->nullable();
            $table->string('pantry_cafe')->nullable();
            $table->string('covered_area')->nullable();
            $table->string('covered_unit')->nullable();
            $table->string('plot_area')->nullable();
            $table->string('plot_unit')->nullable();
            $table->string('current_lease_out')->nullable();
            $table->string('assured_return')->nullable();
            $table->string('other_charges')->nullable();
            $table->string('stamp_duty')->nullable();
            $table->string('m_charges_per')->nullable();
            $table->string('brokerage')->nullable();
            $table->text('common_photos')->nullable();
            $table->text('master_photos')->nullable();
            $table->text('location_photos')->nullable();
            $table->text('others_photos')->nullable();
            $table->string('lift_in_tower')->nullable();
            $table->string('office_floor')->nullable();
            $table->string('mul_unit_avail')->nullable();
            $table->string('building_class')->nullable();
            $table->string('leed_certificate')->nullable();
            $table->string('show_price_as')->nullable();
            $table->string('floor_for_construct')->nullable();
            $table->string('no_open_side')->nullable();
            $table->string('wt_road_facing_plot')->nullable();
            $table->string('any_construction')->nullable();
            $table->string('boundry_wall')->nullable();
            $table->string('plot_length')->nullable();
            $table->string('plot_width')->nullable();
            $table->string('corner_plot')->nullable();
            $table->text('site_photos')->nullable();
            $table->string('main_road_facing')->nullable();
            $table->string('entrance_width')->nullable();
            $table->string('entrance_unit')->nullable();
            $table->string('land_length')->nullable();
            $table->string('l_length_unit')->nullable();
            $table->string('land_breadth')->nullable();
            $table->string('l_breadth_unit')->nullable();
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
        Schema::dropIfExists('property_sales');
    }
}
