<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayPlacePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_place', function (Blueprint $table) {
            $table->unsignedInteger('day_id');
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->unsignedInteger('place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            $table->string('from_hours');
            $table->string('from_minutes');
            $table->string('to_hours');
            $table->string('to_minutes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_place');
    }
}
