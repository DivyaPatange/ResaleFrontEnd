<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->string('job_title')->nullable();
            $table->string('job_type')->nullable();
            $table->text('salary_period')->nullable();
            $table->string('position')->nullable();
            $table->string('min_monthly_salary')->nullable();
            $table->string('max_monthly_salary')->nullable();
            $table->string('min_experience')->nullable();
            $table->string('max_experience')->nullable();
            $table->string('company_name')->nullable();
            $table->text('job_description')->nullable();
            $table->string('photos')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states');
            $table->unsignedInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedInteger('locality_id')->nullable();
            $table->foreign('locality_id')->references('id')->on('localities');
            $table->string('pin_code')->nullable();
            $table->text('address')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_no')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
