<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictureProducts', function (Blueprint $table) {
            $table->integer('id_pictures')->unsigned();
            $table->integer('id_products')->unsigned();
            $table->foreign('id_pictures')->references('id')->on('pictures')->onDelete('cascade');
            $table->foreign('id_products')->references('id')->on('products')->onDelete('cascade');
            $table->primary(['id_pictures', 'id_products']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pictureProducts');
    }
}
