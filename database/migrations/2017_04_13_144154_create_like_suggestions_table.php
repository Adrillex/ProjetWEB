 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_suggestions', function (Blueprint $table) {
            $table->boolean('isLiking');
            $table->integer('suggestion_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('suggestion_id')->references('id')->on('suggestion_box')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['user_id', 'suggestion_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_suggestions');
    }
}
