<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReceptiongood extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_receptiongood', function (Blueprint $table) {
            $table->id();

            // Relacion FK con la tabla product 
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
	        // Relacion FK con la tabla receptiongood 
            $table->unsignedBigInteger('receptiongood_id');
            $table->foreign('receptiongood_id')->references('id')->on('receptiongoods');

            $table->date('expiration_dates');
            $table->integer('quantity');

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
        Schema::dropIfExists('product_receptiongood');
    }
}
