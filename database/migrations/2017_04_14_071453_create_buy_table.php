<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->ondelete('cascade');
            $table->foreign('id_product')->references('id')->on('products')->ondelete('cascade');
            $table->unique(['id_user', 'id_product']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy');
    }
}
