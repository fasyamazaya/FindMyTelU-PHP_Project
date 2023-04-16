<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPlacePivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_place', function (Blueprint $table) {
            $table->unsignedInteger('place_id');

            $table->foreign('place_id', 'place_id_fk_667152')->references('id')->on('places')->onDelete('cascade');

            $table->unsignedInteger('category_id');

            $table->foreign('category_id', 'category_id_fk_667152')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
