<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('username_id');
            $table->string('event_id')->unique();
            $table->string('game');
            $table->string('tournament_name');
            $table->string('platform');
            $table->string('price');
            $table->string('prize');
            $table->string('type');
            $table->string('total_player');
            $table->string('start_date');
            $table->string('time');
            $table->string('check_in');
            $table->string('logo');
            $table->string('banner');
            $table->string('map');
            $table->string('format');
            $table->string('region');
            $table->string('contact');
            $table->string('address');
            $table->string('prize_list');
            $table->string('player_list')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('tournaments');
    }
}
