<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->unsignedInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedInteger('model_id')->nullable();
            $table->foreign('model_id')->references('id')->on('models');
            $table->string('year_of_registration')->nullable();
            $table->string('kms_driven')->nullable();
            $table->string('ad_title')->nullable();
            $table->text('description')->nullable();
            $table->string('photos')->nullable();
            $table->string('price')->nullable();
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
        Schema::dropIfExists('bikes');
    }
}
