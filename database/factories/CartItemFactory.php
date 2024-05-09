<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CartItem;
use App\Models\ProductVariant;
use App\Models\Session;

class CartItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CartItem::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'session_id' => Session::factory(),
            'product_variant_id' => ProductVariant::factory(),
            'quantity' => $this->faker->numberBetween(-10000, 10000),
            'created_at' => $this->faker->dateTime(),
            'modified_at' => $this->faker->dateTime(),
        ];
    }
}
