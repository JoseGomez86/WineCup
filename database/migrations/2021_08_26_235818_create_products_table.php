<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('SKU')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->float('cost');
            $table->float('percent_profit');
            $table->float('price');
            $table->integer('quantity');
            //$table->enum('status',[Product::Baja,Product::Alta])->default(Product::Baja);

            // Relacion FK con la tabla subcategories 
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');

            // Relacion FK con la tabla statusproduct
            $table->unsignedBigInteger('statusproduct_id');
            $table->foreign('statusproduct_id')->references('id')->on('statusproducts');
            
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
        Schema::dropIfExists('products');
    }
}
