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
            $table->string('make');
            $table->string('color');
            $table->string('model');
            $table->string('engine_type');
            $table->string('year');
            $table->string('avg_kmpg');
            $table->string('avg_kmpg');
            $table->string('no_plate');
            $table->string('reg_no');
            $table->string('pessenger_capacity');
            $table->boolean('status');
            $table->string('image');
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
