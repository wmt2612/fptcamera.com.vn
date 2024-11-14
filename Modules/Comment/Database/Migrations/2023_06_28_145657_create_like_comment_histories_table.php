<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Comment\Entities\LikeCommentHistory;

class CreateLikeCommentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_comment_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(LikeCommentHistory::COMMENT_ID);
            $table->string(LikeCommentHistory::IP_ADDRESS);
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
        Schema::dropIfExists('like_comment_histories');
    }
}
