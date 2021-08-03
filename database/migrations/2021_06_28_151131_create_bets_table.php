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
            $table->string('ticket_number');
            $table->integer('match_number');
            $table->string('match_winner');
            $table->string('bet_side');
            $table->integer('match_odd');
            $table->integer('bet_amount');
            $table->integer('bet_prize');
            $table->integer('total_payout');
            $table->string('status');
            $table->integer('cashier_id');
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
