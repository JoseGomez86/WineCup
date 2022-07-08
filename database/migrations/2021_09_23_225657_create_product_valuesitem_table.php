<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductValuesitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_valuesitem', function (Blueprint $table) {
            $table->id();
            // Relacion FK con la tabla product 
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
	        // Relacion FK con la tabla valuesitem 
            $table->unsignedBigInteger('valuesitem_id');
            $table->foreign('valuesitem_id')->references('id')->on('valuesitems');
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
        Schema::dropIfExists('product_valuesitem');
    }
}
