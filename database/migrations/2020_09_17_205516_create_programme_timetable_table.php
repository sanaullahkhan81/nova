<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammeTimetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme_timetable', function (Blueprint $table) {
            $table->uuid('programme_uuid')->primary();
            $table->uuid('channel_uuid');
            $table->string('programme_name', 100);
            $table->timestamp('start_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('duration');
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
        Schema::dropIfExists('programme_timetable');
    }
}
