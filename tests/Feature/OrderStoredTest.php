<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;

class OrderStoredTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testOrderStoredSuccessfully()
    {
        $orderData = [
            "products" =>[
                [
                    'product_id'=> Product::all()->random()->id,
                    'quantity'=> 2,
                ]
            ]
        ];

        $this->json('POST', 'api/orders', $orderData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'created_at',
                    'updated_at',
                    'id',
                ]
            ]);
    }
}
