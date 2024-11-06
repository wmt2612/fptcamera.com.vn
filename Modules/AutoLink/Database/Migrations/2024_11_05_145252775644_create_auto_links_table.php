<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('target_url');
            $table->string('target_type');
            $table->boolean('for_post')->default(0);
            $table->boolean('for_page')->default(0);
            $table->boolean('is_duplicate')->default(0);
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('auto_links');
    }
}
