<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_fields', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->string('yearOfConstruction');
            $table->string('rooms');
            $table->string('heatingType');
            $table->boolean('parking');
            $table->string('returnActual');
            $table->string('price');
            $table->foreignId('property_id')->constrained();
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
        Schema::dropIfExists('property_fields');
    }
}
