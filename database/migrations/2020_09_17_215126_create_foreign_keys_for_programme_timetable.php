<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForProgrammeTimetable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programme_timetable', function (Blueprint $table) {
            $table->foreign('channel_uuid')->references('channel_uuid')->on('channels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('progarmme_timetable',function (Blueprint $table){
            $table->dropForeign('programme_timetable_channel_id_foreign');
        });
    }
}
