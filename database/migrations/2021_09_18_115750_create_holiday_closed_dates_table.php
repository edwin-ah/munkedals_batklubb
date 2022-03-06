<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayClosedDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holiday_closed_dates', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->year('year');
            $table->unsignedTinyInteger('startWeek');
            $table->unsignedTinyInteger('endWeek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holiday_closed_dates');
    }
}
