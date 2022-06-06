<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_fields', function (Blueprint $table) {
            $table->id();
            $table->string('minPrice')->nullable();
            $table->string('maxPrice')->nullable();
            $table->string('minArea')->nullable();
            $table->string('maxArea')->nullable();
            $table->string('minYearOfConstruction')->nullable();
            $table->string('maxYearOfConstruction')->nullable();
            $table->string('minRooms')->nullable();
            $table->string('maxRooms')->nullable();
            $table->string('minReturnActual')->nullable();
            $table->string('maxReturnActual')->nullable();
            $table->foreignId('search_profile_id')->constrained();
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
        Schema::dropIfExists('search_fields');
    }
}
