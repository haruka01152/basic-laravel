<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('actions')->insert([
            ['name' => '新規追加'],
            ['name' => '更新'],
            ['name' => '削除'],
        ]);
    }
}
