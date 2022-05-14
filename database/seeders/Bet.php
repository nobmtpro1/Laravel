<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Bet extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Schema::disableForeignKeyConstraints();
        \DB::table('bets')->truncate();

        $arr = [];
        for ($i = 0; $i < 20; $i++) {
            $arr[] = [
                'match_id' => 1,
                'result' => 1,
                'name' => 'name '.$i,
                'phone' => 'phone '.$i
            ];
        }

        \DB::table('bets')->insert($arr);

        \Schema::enableForeignKeyConstraints();
    }
}
