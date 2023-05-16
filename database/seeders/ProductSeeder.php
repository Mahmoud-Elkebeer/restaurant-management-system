<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        Product::create([
            'title' => 'Burger',
        ]);
    }
}
