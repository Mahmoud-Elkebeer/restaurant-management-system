<?php

namespace App\Listeners;

use App\Events\IngredientStockAlert;
use App\Jobs\RunOutOfStockMerchantAlertJob;
use App\Models\Ingredient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailIngredientStockAlert
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\IngredientStockAlert  $event
     * @return void
     */
    public function handle(IngredientStockAlert $event)
    {
        $stock = $event->stock;
        $ingredient = Ingredient::find($stock->ingredient_id);
        if ($stock->stock < $ingredient->initial_stock/2 && !$ingredient->stock_alert) {
            RunOutOfStockMerchantAlertJob::dispatch($ingredient);
        }
    }
}
