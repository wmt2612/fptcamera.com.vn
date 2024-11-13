<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Rating\Entities\Rating;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(Rating::REPLY_ID)->default(0);
            $table->unsignedBigInteger(Rating::POST_ID)->default(0);
            $table->string(Rating::CUSTOMER_NAME);
            $table->string(Rating::CUSTOMER_PHONE);
            $table->string(Rating::CUSTOMER_GENDER);
            $table->string(Rating::CUSTOMER_EMAIL)->nullable();
            $table->text(Rating::REVIEW)->nullable();
            $table->string(Rating::URL)->nullable();
            $table->integer(Rating::TOTAL_LIKE)->default(0);
            $table->boolean(Rating::RATING)->default(5);
            $table->boolean(Rating::TYPE);
            $table->boolean(Rating::STATUS)->default(Rating::PENDING);
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
        Schema::dropIfExists('ratings');
    }
}
