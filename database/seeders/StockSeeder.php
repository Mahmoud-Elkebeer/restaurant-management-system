<?php

namespace Database\Seeders;

use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->delete();
        $createdAt = Carbon::now()->format('Y-m-d H:i:s');
        $stocks = [
            ['ingredient_id' => 1, 'amount' => 20, 'stock' => 20, 'created_at' =>$createdAt],
            ['ingredient_id' => 2, 'amount' => 5, 'stock' => 5, 'created_at' =>$createdAt],
            ['ingredient_id' => 3, 'amount' => 1, 'stock' => 1, 'created_at' =>$createdAt],
        ];

        Stock::insert($stocks);
    }
}
