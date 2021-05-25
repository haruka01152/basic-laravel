<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('makers')->insert([
            ['name' => 'NTT',
        ],
        [
            'name' => 'サクサ',
        ],
        [
            'name' => 'セキュリティハウス',
        ],
        ]);
    }
}
