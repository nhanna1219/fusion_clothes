<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\OrderDetail;
use App\Models\ProductVariant;

class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'order_id' => OrderDetail::factory(),
            'product_id' => ProductVariant::factory(),
            'quantity' => $this->faker->numberBetween(0, 10000),
            'created_at' => now(),
            'modified_at' => now(),
        ];
    }
}
