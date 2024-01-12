<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->integer('category_service_id')->unsigned()->index();
            $table->string('bandwidth')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('is_hot')->default(false);
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('services');
    }
}
