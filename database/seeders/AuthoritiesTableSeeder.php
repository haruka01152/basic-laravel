<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthoritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('authorities')->insert([
            ['name' => '管理者'],
            ['name' => '編集者'],
            ['name' => '閲覧者'],
        ]);
    }
}
