<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLimitToAutoLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auto_links', function (Blueprint $table) {
            if (!Schema::hasColumn('auto_links', 'limit')) {
                $table->tinyInteger('limit')->default(5);
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
        Schema::table('auto_links', function (Blueprint $table) {
            if (Schema::hasColumn('auto_links', 'limit')) {
                $table->dropColumn('limit');
            }
        });
    }
}
