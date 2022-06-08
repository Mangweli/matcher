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
            $table->uuid('id')->primary();//->default(DB::raw('(uuid())'))
            $table->string('name');
            $table->string('description');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });

        DB::Table('property_types')
            ->insert([
                [
                    'id'          => Str::uuid()->toString(),
                    'name'        => 'Single-family dwelling',
                    'description' => 'Any home designed for only one family'
                ],
                [
                    'id'          => Str::uuid()->toString(),
                    'name'        => 'Multi-family dwelling',
                    'description' => 'Any group of homes designed for more than one family'
                ],
                [
                    'id'          => Str::uuid()->toString(),
                    'name'        => 'Attached',
                    'description' => 'Any unit that\'s connected to another (not freestanding)'
                ],
                [
                    'id'          => Str::uuid()->toString(),
                    'name'        => 'Apartment',
                    'description' => 'An individual unit in a multi-unit building. The boundaries of the apartment are generally defined by a perimeter of locked or lockable doors. Often seen in multi-story apartment buildings.'
                ],
                [
                    'id'          => Str::uuid()->toString(),
                    'name'        => 'Multi-family house',
                    'description' => 'Often seen in multi-story detached buildings, where each floor is a separate apartment or unit.'
                ],
                [
                    'id'          => Str::uuid()->toString(),
                    'name'        => 'Condominium (Condo)',
                    'description' => 'A building with individual units owned by individual people.'
                ],
                [
                    'id'          => Str::uuid()->toString(),
                    'name'        => 'Detached house',
                    'description' => 'A free-standing building not connecting to anything else (a stereotypical “home”)'
                ],
                [
                    'id'          => Str::uuid()->toString(),
                    'name'        => 'Portable house',
                    'description' => 'Houses that can be moved on a flatbed truck'
                ],
                [
                    'id'          => Str::uuid()->toString(),
                    'name'        => 'Mobile home',
                    'description' => 'A vehicle on wheels that has a permanent residence attached to it'
                ],
                [
                    'id'          => Str::uuid()->toString(),
                    'name'        => 'Villa',
                    'description' => 'A building with only one room and typically a steep pointy roof'
                ],
                [
                    'id'          => Str::uuid()->toString(),
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
