<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Match1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('match1s')->truncate();

        DB::table('match1s')->insert([
            [
                'team1' => 'Việt Nam',
                'team2' => 'Indonesia',
                'time_start' => '2022-05-10 15:40:34',
                'result' => 0,
                'is_active' => 1,
                'team1_image' => '/storage/image/JDHVdm97o1FEnaQlBAEoZfm4a42qz3SEiVdavp6l.jpg',
                'team2_image' => '/storage/image/fJbOeZnFrwVluNmHlzc8p9XqLrPl3v8OgRtc0vgR.jpg'
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
