<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'username' => 'admin',
                'name' => 'Administrator',
                'password' => Hash::make('codev@2022'),
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
