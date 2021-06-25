<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class suppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('suppliers')->insert([
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
