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
            'amount' => $this->faker->randomFloat(2, 0, 1000),
            'payment_method' => $this->faker->randomElement(['Momo', 'COD']),
            'status' => $this->faker->randomElement(['Paid', 'Unpaid', 'Refunded']),
            'created_at' => now(),
            'modified_at' => now(),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (PaymentDetail $paymentDetail) {
            $order = Order::find($paymentDetail->order_id);

            if ($paymentDetail->payment_method === 'Momo') {
                if ($order->status !== 'Cancelled') {
                    $paymentDetail->status = 'Paid';
                } else {
                    $paymentDetail->status = 'Refunded';
                }
            } else {
                if ($order->status !== 'Shipped') {
                    $paymentDetail->status = 'Unpaid';
                } else {
                    $paymentDetail->status = 'Paid';
                }
            }
            $paymentDetail->save();
        });
    }
}
