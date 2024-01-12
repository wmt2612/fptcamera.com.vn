<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagPTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_p_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tag_p_id')->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->unique(['tag_p_id', 'locale']);
            $table->foreign('tag_p_id')->references('id')->on('tag_ps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_p_translations');
    }
}
