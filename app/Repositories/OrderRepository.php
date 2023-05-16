<?php

namespace App\Repositories;

use App\Models\Order;
use App\Jobs\UpdateIngredientsStockJob;


class OrderRepository
{
    public function create($inputs): Order
    {
        $order = new Order();
        $order->save();
        $order->products()->sync($inputs['products']);

        UpdateIngredientsStockJob::dispatch($order);

        return $order;
    }
}
