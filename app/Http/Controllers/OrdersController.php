<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
use App\Repositories\OrderRepository;
use Symfony\Component\HttpFoundation\Response;

class OrdersController extends Controller
{
    public function __construct(private OrderRepository $orderRepository) {}

    public function store(OrdersRequest $request): object
    {
        $order = $this->orderRepository->create($request->validated());
        return response()->json(['data' => $order], Response::HTTP_CREATED);
    }
}
