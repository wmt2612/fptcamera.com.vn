<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryServiceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_service_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_service_id')->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('intro')->nullable();


            $table->unique(['category_service_id', 'locale']);
            $table->foreign('category_service_id')->references('id')->on('category_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_service_translations');
    }
}
