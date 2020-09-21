<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForProgrammeInforamtionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programme_information', function (Blueprint $table) {
            $table->foreign('programme_uuid')->references('programme_uuid')->on('programme_timetable')->onDelete('cascade');
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
            $table->dropForeign('programme_information_channel_id_foreign');
            $table->dropForeign('programme_information_programme_id_foreign');
        });
    }
}
