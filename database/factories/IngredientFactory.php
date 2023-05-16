<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'unit' => $this->faker->randomElement(['Kilogram', 'Liter', 'Packet']),
            'initial_stock' => $this->faker->randomNumber(),
            'stock_alert' => $this->faker->boolean,
        ];
    }
}
