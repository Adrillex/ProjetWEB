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
            $table->integer('id_suggestion')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->foreign('id_suggestion')->references('id')->on('suggestion_box')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['id_user', 'id_suggestion']);
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
