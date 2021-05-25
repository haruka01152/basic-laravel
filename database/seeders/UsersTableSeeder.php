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
                'email' => 'haruka.0115maple@yahoo.ne.jp',
                'password' => Hash::make('hamutarou115'),
                'authority' => 0,
            ],
            [
                'name' => 'hoge1',
                'email' => 'hoge1@hoge.com',
                'password' => Hash::make('password'),
                'authority' => 0,
            ], [
                'name' => 'hoge2',
                'email' => 'hoge2@hoge.com',
                'password' => Hash::make('password'),
                'authority' => 1,
            ], [
                'name' => 'hoge3',
                'email' => 'hoge3@hoge.com',
                'password' => Hash::make('password'),
                'authority' => 2,
            ],
        ]);
    }
}
