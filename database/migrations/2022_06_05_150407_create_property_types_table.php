<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_types', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        DB::Table('property_types')
            ->insert([
                [
                    'name'        => 'Single-family dwelling',
                    'description' => 'Any home designed for only one family'
                ],
                [
                    'name'        => 'Multi-family dwelling',
                    'description' => 'Any group of homes designed for more than one family'
                ],
                [
                    'name'        => 'Attached',
                    'description' => 'Any unit that\'s connected to another (not freestanding)'
                ],
                [
                    'name'        => 'Apartment',
                    'description' => 'An individual unit in a multi-unit building. The boundaries of the apartment are generally defined by a perimeter of locked or lockable doors. Often seen in multi-story apartment buildings.'
                ],
                [
                    'name'        => 'Multi-family house',
                    'description' => 'Often seen in multi-story detached buildings, where each floor is a separate apartment or unit.'
                ],
                [
                    'name'        => 'Condominium (Condo)',
                    'description' => 'A building with individual units owned by individual people.'
                ],
                [
                    'name'        => 'Detached house',
                    'description' => 'A free-standing building not connecting to anything else (a stereotypical “home”)'
                ],
                [
                    'name'        => 'Portable house',
                    'description' => 'Houses that can be moved on a flatbed truck'
                ],
                [
                    'name'        => 'Mobile home',
                    'description' => 'A vehicle on wheels that has a permanent residence attached to it'
                ],
                [
                    'name'        => 'Villa',
                    'description' => 'A building with only one room and typically a steep pointy roof'
                ],
                [
                    'name'        => 'Hut',
                    'description' => 'A dwelling typically made of raw materials such as bamboo, mud, and clay'
                ],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_types');
    }
}
