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
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id')->nullable();
            $table->integer('result')->default(0)->comment('1: team1 win, 2: hoà, 3: team2 win');
            // $table->integer('team1_score')->default(0);
            // $table->integer('team2_score')->default(0);
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            // $table->string('cmnd')->nullable();
            $table->integer('is_lucky')->default(0);
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
        Schema::dropIfExists('bets');
    }
}
