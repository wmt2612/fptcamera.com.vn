<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Rating\Entities\Rating;
class UpdateNullableRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ratings', function (Blueprint $table) {
            if(Schema::hasColumn('ratings', Rating::CUSTOMER_NAME)) {
                $table->string(Rating::CUSTOMER_NAME)->nullable()->change();
            }
            if(Schema::hasColumn('ratings', Rating::CUSTOMER_EMAIL)) {
                $table->string(Rating::CUSTOMER_EMAIL)->nullable()->change();
            }
            if(Schema::hasColumn('ratings', Rating::CUSTOMER_GENDER)) {
                $table->string(Rating::CUSTOMER_GENDER)->nullable()->change();
            }
            if(Schema::hasColumn('ratings', Rating::CUSTOMER_PHONE)) {
                $table->string(Rating::CUSTOMER_PHONE)->nullable()->change();
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
