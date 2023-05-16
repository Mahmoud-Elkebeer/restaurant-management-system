<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }

    public function ingredients()
    {
        return $this->products()
            ->join('ingredient_product', 'products.id', '=', 'ingredient_product.product_id')
            ->join('ingredients', 'ingredient_product.ingredient_id', '=', 'ingredients.id')
            ->select('ingredients.*')
            ->withPivot(['order_product.quantity as pivot_quantity', 'ingredient_product.amount as pivot_amount'])
            ->withTimestamps();
    }
}
