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
            'order_id' => null,
            'product_variant_id' => ProductVariant::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'modified_at' => now(),
        ];
    }
}
