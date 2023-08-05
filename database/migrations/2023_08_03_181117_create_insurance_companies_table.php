<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_companies', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('contact_website')->nullable();
            $table->string('phone')->nullable();
            $table->string('Lisence_no')->nullable();
            $table->string('type_insurance_service')->nullable();
            $table->string('type_insurance_plan')->nullable();
            $table->string('upload_license')->nullable();
            $table->longText('company_description')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_companies');
    }
}
