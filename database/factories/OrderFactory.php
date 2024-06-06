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
        // return $this->afterCreating(function (Order $order) {
        //     $orderDetails = OrderDetail::factory()->count(3)->create(['order_id' => $order->id]);

        //     $total = $orderDetails->sum(function ($detail) {
        //         return $detail->quantity * $detail->price;
        //     });

        //     $order->update(['total' => $total]);

        //     PaymentDetail::factory()->create(['order_id' => $order->id]);

        //     unset($orderDetails);
        //     unset($total);
        // });
    }
}
