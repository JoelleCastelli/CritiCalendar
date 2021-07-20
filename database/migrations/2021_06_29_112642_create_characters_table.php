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
            $table->string('name')->nullable();
            $table->string('ancestry')->nullable();
            $table->string('class')->nullable();
            $table->string('alignment')->nullable();
            $table->integer('level')->nullable();
            $table->integer('XP')->nullable();
            $table->integer('HP')->nullable();
            $table->integer('strength')->nullable();
            $table->integer('initiative')->nullable();
            $table->integer('speed')->nullable();
            $table->integer('dexterity')->nullable();
            $table->integer('constitution')->nullable();
            $table->integer('intelligence')->nullable();
            $table->integer('wisdom')->nullable();
            $table->integer('charisma')->nullable();
            $table->text('attacks')->nullable();
            $table->text('languages')->nullable();
            $table->text('equipment')->nullable();
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
