<?php

namespace App\Repositories;

use App\Models\Stock;

class StockRepository
{
    public function create($inputs): Stock
    {
        $stock = new Stock();
        $stock->fill($inputs);
        $stock->stock = $this->getIngredientStock($stock->ingredient_id) + $stock->amount;
        $stock->save();

        return $stock;
    }

    public function getIngredientStock($ingredientId): float
    {
        $ingredientStock =  Stock::query()
            ->where('ingredient_id', $ingredientId)
            ->orderByDesc('id')
            ->first('stock');

        return $ingredientStock ? $ingredientStock->stock : 0;
    }
}
