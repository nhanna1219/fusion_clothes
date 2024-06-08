<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentDetail;
use App\Models\ProductVariant;
use Faker\Factory as FakerFactory;
use Carbon\Carbon;
class CreateOrdersWithDetails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-orders-with-details';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $faker = FakerFactory::create();
        $startDate = Carbon::create(2024, 1, 1);
        $endDate = Carbon::now();

        $orders = Order::factory()->count(200)->create()->each(function ($order) use ($faker, $startDate, $endDate) {
            // Randomize created_at and updated_at dates
            $randomDate = $faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d H:i:s');
            $order->created_at = $randomDate;
            $order->modified_at = $randomDate;
            $order->save();

            // Create order details
            $orderDetailCount = rand(1, 5);
            $orderDetails = OrderDetail::factory()->count($orderDetailCount)->create([
                'order_id' => $order->id,
                'created_at' => $randomDate,
                'modified_at' => $randomDate,
            ]);

            // Calculate total
            $total = $orderDetails->sum(function ($orderDetail) {
                $productVariant = ProductVariant::find($orderDetail->product_variant_id);
                $productPrice = $productVariant->product->price;
                return $productPrice * $orderDetail->quantity;
            });

            $total = $total + ($total * 0.1) + 30;

            $order->update(['total' => $total]);
        });

        foreach ($orders as $order) {
            $createdAt = Carbon::parse($order->created_at);
            $modifiedAt = Carbon::parse($order->updated_at);
            PaymentDetail::factory()->create([
                'order_id' => $order->id,
                'amount' => $order->total,
                'created_at' => $createdAt->format('Y-m-d H:i:s'),
                'modified_at' => $modifiedAt->format('Y-m-d H:i:s'),
            ]);
        }
        $this->info('Orders with details and payment details created successfully.');
    }
}
