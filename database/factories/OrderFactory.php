<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\PaymentDetail;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(['Pending', 'Processing', 'On Delivery', 'Cancelled', 'Shipped']),
            'total' => 0,
            'created_at' => now(),
            'modified_at' => now(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            // // Create Order Details
            // $orderDetails = OrderDetail::factory()->count(5)->make();

            // $total = 0;
            // foreach ($orderDetails as $orderDetail) {
            //     $orderDetail->order_id = $order->id;
            //     $orderDetail->save();
            //     $total += $orderDetail->price * $orderDetail->quantity;
            // }

            // $order->update(['total' => $total]);

            // // Create Payment Detail
            // PaymentDetail::factory()->create([
            //     'order_id' => $order->id,
            //     'amount' => $total,
            //     'payment_method' => $this->faker->randomElement(['Credit Card', 'PayPal', 'Bank Transfer']),
            //     'payment_status' => $this->faker->randomElement(['Paid', 'Pending', 'Failed']),
            // ]);
        });
    }
}
