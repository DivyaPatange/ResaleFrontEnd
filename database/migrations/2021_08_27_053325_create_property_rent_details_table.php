<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyRentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_rent_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('rent_id');
            $table->foreign('rent_id')->references('id')->on('property_rents');
            $table->string('ac');
            $table->string('bed');
            $table->string('wardrobe');
            $table->string('tv');
            $table->string('furnished_detail');
            $table->string('covered_no');
            $table->string('open_no');
            $table->string('name');
            $table->string('email');
            $table->string('mobile_no');
            $table->unsignedInteger('user_state');
            $table->foreign('user_state')->references('id')->on('states');
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
        Schema::dropIfExists('property_rent_details');
    }
}
