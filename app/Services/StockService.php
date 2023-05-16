<?php

namespace App\Services;

use App\Repositories\StockRepository;
use Illuminate\Support\Facades\Log;
use Exception;

class StockService
{
    public function __construct(private StockRepository $stockRepository) {}

    public function updateIngredientsStockAfterOrderSaved($order): void
    {
        try {
            foreach ($order->ingredients as $ingredient) {
                $this->stockRepository->create([
                    'ingredient_id' => $ingredient->id,
                    'amount' => $ingredient->pivot->quantity * $ingredient->pivot->amount * -1
                ]);
            }
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
        }
    }
}
