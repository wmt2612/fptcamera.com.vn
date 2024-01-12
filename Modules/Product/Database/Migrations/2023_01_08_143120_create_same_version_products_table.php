<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSameVersionProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('same_version_products', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('same_version_product_id')->unsigned();
            $table->primary(['product_id', 'same_version_product_id']);
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
        Schema::dropIfExists('same_version_products');
    }
}
