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
            $table->string('name');
            $table->string('slug');
            $table->string('rent_amount');
            $table->string('doors');
            $table->string('passengers');
            $table->string('luggage');
            $table->string('min_age_to_take_rent');
            $table->string('car_photo_path')->nullable();
            $table->string('highest_speed');
            $table->string('air_condition');
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('added_by_user_id')->references('id')->on('users');;
            $table->boolean('review_status')->default(true);
            $table->integer('transmission_mode')->default(0);
            $table->integer('power_type')->default(0);
            $table->text('car_details');
            $table->string('car_class')->default('0');
            $table->string('car_image_single_page_view')->nullable();
            $table->string('model_release')->default('2020');
            $table->boolean('cars_availability')->default(true);
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
