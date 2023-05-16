<?php

namespace App\Models;

use App\Events\IngredientStockAlert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'created' => IngredientStockAlert::class,
    ];

    protected $fillable = [
        'ingredient_id',
        'amount',
        'stock'
    ];
}
