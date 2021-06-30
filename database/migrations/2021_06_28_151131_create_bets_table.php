<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bet', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('datetime');
            $table->integer('bet_prize');
            $table->string('serial_number');
            $table->string('bet_status');
            $table->integer('match_id');
            $table->integer('bet_amount');
            $table->integer('bet_odds');
            $table->integer('cashier_id');
            $table->string('bet_side');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bets');
    }
}
