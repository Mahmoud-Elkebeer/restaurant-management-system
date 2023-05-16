<?php

namespace Tests\Unit;

use App\Models\Ingredient;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use App\Repositories\StockRepository;
use App\Services\StockService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UpdateIngredientsStockAfterOrderSavedTest extends TestCase
{
    use DatabaseTransactions;

    private StockRepository $stockRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->stockRepository = app(StockRepository::class);
    }

    public function testIngredientsStockUpdatedCorrectlyAfterOrderSaved()
    {
        $milk = Ingredient::factory()->create();
        $pasta = Product::factory()->create();
        $pasta->ingredients()->attach([$milk->id => ['amount' => 1]]);
        $order = Order::factory()->create();
        $order->products()->attach([$pasta->id => ['quantity' => 2]]);

        $service = new StockService($this->stockRepository);
        $service->updateIngredientsStockAfterOrderSaved($order);

        $milkStock = Stock::where('ingredient_id', $milk->id)->first();

        $this->assertEquals(-2, $milkStock->stock);
    }
}
