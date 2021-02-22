<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePGHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_g_houses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->string('locality')->nullable();
            $table->string('address')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('landmark')->nullable();
            $table->string('pg_operational_since')->nullable();
            $table->string('pg_present_in')->nullable();
            $table->string('pg_name')->nullable();
            $table->string('ad_posted_by')->nullable();
            $table->string('rooms_categories')->nullable();
            $table->string('no_of_single_sharing_room')->nullable();
            $table->string('mo_rent_p_bed_single')->nullable();
            $table->string('security_deposit_single')->nullable();
            $table->string('no_of_double_sharing_room')->nullable();
            $table->string('mo_rent_p_bed_double')->nullable();
            $table->string('security_deposit_double')->nullable();
            $table->string('no_of_triple_sharing_room')->nullable();
            $table->string('mo_rent_p_bed_triple')->nullable();
            $table->string('security_deposit_triple')->nullable();
            $table->string('no_of_four_sharing_room')->nullable();
            $table->string('mo_rent_p_bed_four')->nullable();
            $table->string('security_deposit_four')->nullable();
            $table->string('no_of_other_sharing_room')->nullable();
            $table->string('mo_rent_p_bed_other')->nullable();
            $table->string('security_deposit_other')->nullable();
            $table->string('room_facility')->nullable();
            $table->string('preferred_gender')->nullable();
            $table->string('tenent_preference')->nullable();
            $table->string('pg_rules')->nullable();
            $table->string('notice_period')->nullable();
            $table->string('gate_closing_time')->nullable();
            $table->string('available_services')->nullable();
            $table->string('food_provided')->nullable();
            $table->string('amenities')->nullable();
            $table->string('parking_availability')->nullable();
            $table->string('pg_description')->nullable();
            $table->string('photos')->nullable();
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
        Schema::dropIfExists('p_g_houses');
    }
}
