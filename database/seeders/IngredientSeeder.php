<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->delete();
        $createdAt = Carbon::now()->format('Y-m-d H:i:s');
        $ingredients = [
            ['title' => 'Beef', 'unit' => 'kilogram', 'initial_stock'=> 20, 'created_at' => $createdAt],
            ['title' => 'Cheese', 'unit' => 'kilogram', 'initial_stock'=> 5, 'created_at' => $createdAt],
            ['title' => 'Onion', 'unit' => 'kilogram', 'initial_stock'=> 1, 'created_at' => $createdAt],
        ];
        Ingredient::insert($ingredients);
    }
}
