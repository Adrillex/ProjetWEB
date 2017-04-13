<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribe', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->integer('id_activity')->unsigned();
            $table->foreign('id_user')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('id_activity')->references('id')->on('date')->onDelete('cascade');
            $table->primary(['id_user', 'id_activity']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribe');
    }
}
