<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('meron_odd');
            $table->string('wala_odd');
            $table->string('winner');
            $table->integer('match_number');
            $table->integer('meron_total');
            $table->integer('wala_total');
            $table->integer('meron_win_total');
            $table->integer('wala_win_total');
            $table->integer('meron_bet_total');
            $table->integer('wala_bet_total');
            $table->integer('total_bet');
            $table->boolean('is_current_match');
            $table->boolean('is_displayed');
            $table->boolean('disable_betting');
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
        Schema::dropIfExists('matches');
    }
}
