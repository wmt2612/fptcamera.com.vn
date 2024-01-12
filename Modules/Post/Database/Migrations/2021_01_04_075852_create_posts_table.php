<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('slug')->unique();
                $table->integer('user_id')->unsigned()->index();
                $table->boolean('is_active');
                $table->boolean('is_thumbnail_display')->default(true);
                $table->string('sidebar_layout')->default('default');
                $table->boolean('is_toc')->default(true);
                $table->string('video')->nullable();
                $table->softDeletes();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
