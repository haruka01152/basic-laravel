<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['supplier_id' => 1,
            'name' => 'ZX電話機',
            'price' => 20000,
            'quantity' => 10,
            'last_editor' => 1,
        ],
        [
            'supplier_id' => 1,
            'name' => 'NX電話機',
            'price' => 25000,
            'quantity' => 15,
            'last_editor' => 2,
        ],
        [
            'supplier_id' => 2,
            'name' => 'サクサ電話機',
            'price' => 30000,
            'quantity' => 13,
            'last_editor' => 1,
        ],
        [
            'supplier_id' => 2,
            'name' => 'サクサHUB',
            'price' => 20000,
            'quantity' => 10,
            'last_editor' => 3,
        ],
        [
            'supplier_id' => 3,
            'name' => 'セキュリティハウス　カメラ',
            'price' => 15000,
            'quantity' => 3,
            'last_editor' => 2,
        ],
        ]);
    }
}
