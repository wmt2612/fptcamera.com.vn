<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Rating\Entities\LikeRatingHistory;

class CreateLikeRatingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_rating_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(LikeRatingHistory::RATING_ID);
            $table->string(LikeRatingHistory::IP_ADDRESS);
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
        Schema::dropIfExists('like_rating_histories');
    }
}
