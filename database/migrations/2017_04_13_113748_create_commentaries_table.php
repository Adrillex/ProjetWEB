<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaries', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->date('creation_date');
            $table->integer('id_activity')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->foreign('id_activity')->references('id')->on('activities');
            $table->foreign('id_users')->references('id')->on('users');
            //$table->timestamps(creation_date);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaries');
    }
}
