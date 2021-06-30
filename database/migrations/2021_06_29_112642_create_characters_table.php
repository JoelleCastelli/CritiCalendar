<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->integer('player_id');
            $table->integer('campaign_id');
            $table->string('name');
            $table->string('ancestry');
            $table->string('class');
            $table->string('alignment');
            $table->integer('level');
            $table->integer('XP');
            $table->integer('HP');
            $table->integer('strength');
            $table->integer('initiative');
            $table->integer('speed');
            $table->integer('dexterity');
            $table->integer('constitution');
            $table->integer('intelligence');
            $table->integer('wisdom');
            $table->integer('charisma');
            $table->text('attacks');
            $table->text('languages');
            $table->text('equipment');
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
        Schema::dropIfExists('characters');
    }
}
