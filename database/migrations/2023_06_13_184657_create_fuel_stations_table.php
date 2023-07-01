<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_stations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->longText('address')->nullable();
            $table->longText('residential_address')->nullable();
            $table->string('capacity')->nullable();
            $table->string('rate_per_liter')->nullable();
            $table->string('franchiser_name')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->boolean('is_petrol')->nullable();
            $table->boolean('is_diesel')->nullable();
            $table->boolean('is_hi_oct')->nullable();
            $table->longText('notes')->nullable();
            $table->string('approval_certificate_image')->nullable();
            $table->string('fuel_station_image')->nullable();
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
        Schema::dropIfExists('fuel_stations');
    }
}
