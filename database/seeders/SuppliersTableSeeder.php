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
        [
            'name' => 'NTT',
        ],
        [
            'name' => 'サクサ',
        ],
        [
            'name' => 'セキュリティハウス/TAKEX',
        ],
        [
            'name' => 'ABUS',
        ],
        [
            'name' => 'APC',
        ],
        [
            'name' => 'AXIS',
        ],
        [
            'name' => 'Cisco',
        ],
        [
            'name' => 'ELECOM',
        ],
        [
            'name' => 'FUDEMAME',
        ],
        [
            'name' => 'HPE(ARUBA)',
        ],
        [
            'name' => 'NSK',
        ],
        [
            'name' => 'ORION',
        ],
        [
            'name' => 'Panasonic',
        ],
        [
            'name' => 'SMART SENSOR',
        ],
        [
            'name' => 'TAKACOM',
        ],
        [
            'name' => 'TRIPOD',
        ],
        [
            'name' => 'WatchGuard',
        ],
        [
            'name' => '岩崎通信',
        ],
        [
            'name' => 'エイム電子',
        ],
        [
            'name' => 'キャノン',
        ],
        [
            'name' => 'シーアイ化成',
        ],
        [
            'name' => 'シャープ',
        ],
        [
            'name' => '東芝',
        ],
        [
            'name' => '日本映像システム',
        ],
        [
            'name' => 'ニューテック',
        ],
        [
            'name' => 'ノボル',
        ],
        [
            'name' => 'バッファロー',
        ],
        [
            'name' => '日立ナカヨ屋',
        ],
        [
            'name' => '富士ゼロックス',
        ],
        [
            'name' => 'メガソフト',
        ],
        [
            'name' => 'ヤコブイェンセン',
        ],
        [
            'name' => 'YAMAHA',
        ],
        [
            'name' => 'JapanSecuritySystem',
        ],
        [
            'name' => 'レッツ・コーポレーション',
        ],
        [
            'name' => '不明・その他',
        ],  
        ]);
    }
}
