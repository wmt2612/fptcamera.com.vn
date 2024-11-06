<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoLinkTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_link_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('auto_link_id')->unsigned();
            $table->string('locale');
            $table->string('title');
            $table->unique(['auto_link_id', 'locale']);
            $table->foreign('auto_link_id')->references('id')->on('auto_links')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto_link_translations');
    }
}
