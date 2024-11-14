<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Comment\Entities\Comment;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger(Comment::REPLY_ID)->default(0);
            $table->unsignedBigInteger(Comment::USER_ID)->default(0);
            $table->unsignedBigInteger(Comment::POST_ID)->default(0);
            $table->string(Comment::CUSTOMER_NAME);
            $table->string(Comment::CUSTOMER_EMAIL)->nullable();
            $table->string(Comment::CUSTOMER_PHONE)->nullable();
            $table->string(Comment::CUSTOMER_GENDER)->nullable();
            $table->text(Comment::CONTENT);
            $table->string(Comment::URL)->nullable();
            $table->integer(Comment::TOTAL_LIKE)->default(0);
            $table->boolean(Comment::TYPE);
            $table->boolean(Comment::STATUS)->default(Comment::PENDING);
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
        Schema::dropIfExists('comments');
    }
}
