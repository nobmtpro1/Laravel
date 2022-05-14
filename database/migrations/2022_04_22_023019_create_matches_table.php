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
        Schema::create('match1s', function (Blueprint $table) {
            $table->id();
            $table->string('team1')->nullable();
            $table->string('team2')->nullable();
            $table->longText('team1_image')->nullable();
            $table->longText('team2_image')->nullable();
            $table->timestamp('time_start')->nullable();
            // $table->timestamp('time_end')->nullable();
            // $table->longText('info')->nullable();
            $table->integer('result')->default(0)->comment('0: chưa đá, 1: team1 win, 2: hoà, 3: team2 win');
            // $table->integer('team1_score')->default(0);
            // $table->integer('team2_score')->default(0);
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('match1s');
    }
}
