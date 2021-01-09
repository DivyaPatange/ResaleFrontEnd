<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->unsignedInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->nullable();
            $table->unsignedInteger('model_id');
            $table->foreign('model_id')->references('id')->on('models')->nullable();
            $table->string('price');
            $table->string('year_of_registration')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('transmission')->nullable();
            $table->string('kms_driven')->nullable();
            $table->string('no_of_owners')->nullable();
            $table->string('ad_title');
            $table->string('description');
            $table->string('photos');
            $table->unsignedInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states');
            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('pin_code');
            $table->text('address');
            $table->string('name');
            $table->string('email');
            $table->string('mobile_no');
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
        Schema::dropIfExists('cars');
    }
}
