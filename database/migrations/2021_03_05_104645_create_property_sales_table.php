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
            $table->string('project_name')->nullable();
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
            $table->string('exterior_photos')->nullable();
            $table->string('living_photos')->nullable();
            $table->string('bedroom_photos')->nullable();
            $table->string('bathroom_photos')->nullable();
            $table->string('kitchen_photos')->nullable();
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
            $table->string('landmark')->nullable();
            $table->string('listed_by')->nullable();
            $table->string('rera_id')->nullable();
            $table->string('land_zone')->nullable();
            $table->string('ideal_business')->nullable();
            $table->string('metro_station')->nullable();
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
