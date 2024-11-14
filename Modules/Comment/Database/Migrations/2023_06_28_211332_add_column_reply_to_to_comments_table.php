<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Comment\Entities\Comment;

class AddColumnReplyToToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            if(!Schema::hasColumn('comments', Comment::REPLY_TO)) {
                $table->unsignedBigInteger(Comment::REPLY_TO)->after(Comment::REPLY_ID)->default(0);
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
        Schema::table('comments', function (Blueprint $table) {

        });
    }
}
