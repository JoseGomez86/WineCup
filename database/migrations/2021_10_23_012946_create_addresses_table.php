<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');//guardar el nombre de referecia casa, trabajo, etc.
            $table->string('street');
            $table->string('number');
            //datos en caso de que sea departamento
            $table->string('apartmentComplex')->nullable();
            $table->string('edifice')->nullable();
            $table->string('floor')->nullable();
            $table->string('apartment')->nullable();
            //referencias para encontrar la dirección.
            $table->string('reference')->nullable();

            // Relacion FK con la tabla provinces
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces');
            // Relacion FK con la tabla districts
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts');
            // Relacion FK con la tabla localities
            $table->unsignedBigInteger('locality_id');
            $table->foreign('locality_id')->references('id')->on('localities');
            // Relacion FK con la tabla postcodes 
            $table->unsignedBigInteger('postcode_id');
            $table->foreign('postcode_id')->references('id')->on('postcodes');
            // Relacion FK con la tabla users
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('addresses');
    }
}
