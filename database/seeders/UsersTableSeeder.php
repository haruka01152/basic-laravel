<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'haruka',
                'email' => 'yamamoto-har@kk-technica.co.jp',
                'password' => Hash::make('Technica123'),
                'authority' => 1,
            ],
        ]);
    }
}
