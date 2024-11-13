<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Rating\Entities\Rating;

class AddColumnUserIdToRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ratings', function (Blueprint $table) {
            if(!Schema::hasColumn(Rating::TABLE_NAME, Rating::USER_ID)) {
                $table->unsignedBigInteger(Rating::USER_ID)->default(0)->after(Rating::POST_ID);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ratings', function (Blueprint $table) {

        });
    }
}
