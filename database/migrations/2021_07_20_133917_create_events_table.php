<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id');
            $table->id('id_event');
            $table->string('title');
            $table->string('start');
            $table->string('end')->nullable();
            $table->string('place')->nullable();
            $table->string('URL')->nullable();
            $table->text('recap')->nullable();
            $table->integer('campaign_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
