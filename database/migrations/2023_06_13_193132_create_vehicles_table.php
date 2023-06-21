<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('make')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('color')->nullable();
            $table->string('model')->nullable();
            $table->string('engine_type')->nullable();
            $table->string('year')->nullable();
            $table->string('avg_kmpg')->nullable();
            $table->string('license_plate')->nullable();
            $table->string('license_no')->nullable();
            $table->string('vehicle_owning_time')->nullable();
            $table->string('current_car_value')->nullable();
            $table->string('car_travel_distance')->nullable();
            $table->boolean('status')->nullable();
            $table->string('vehicle_image')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
