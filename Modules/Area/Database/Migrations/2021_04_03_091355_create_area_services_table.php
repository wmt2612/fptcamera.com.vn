<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_services', function (Blueprint $table) {
            $table->integer('area_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->integer('price_area')->nullable();
            $table->primary(['area_id', 'service_id']);
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('area_services');
    }
}
