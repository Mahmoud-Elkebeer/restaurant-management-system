<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredient_product')->delete();

        $ingredients = [
            [
                'ingredient_id' => 1,
                'amount' => 0.18
            ],
            [
                'ingredient_id' => 2,
                'amount' => 0.005
            ],
            [
                'ingredient_id' => 3,
                'amount' => 0.15
            ]
        ];

        Product::find(1)->ingredients()->sync($ingredients);
    }
}
