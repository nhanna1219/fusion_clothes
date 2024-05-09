<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\PaymentDetail;

class PaymentDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'amount' => $this->faker->randomFloat(2, 0, 99999999.99),
            'status' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'created_at' => $this->faker->dateTime(),
            'modified_at' => $this->faker->dateTime(),
        ];
    }
}
