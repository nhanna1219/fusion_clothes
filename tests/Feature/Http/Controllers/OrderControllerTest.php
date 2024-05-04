<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\OrderController
 */
final class OrderControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $orders = Order::factory()->count(3)->create();

        $response = $this->get(route('orders.index'));

        $response->assertOk();
        $response->assertViewIs('customer.orders.index');
        $response->assertViewHas('orders');
    }


    #[Test]
    public function show_displays_view(): void
    {
        $order = Order::factory()->create();

        $response = $this->get(route('orders.show', $order));

        $response->assertOk();
        $response->assertViewIs('customer.orders.details');
        $response->assertViewHas('orders');
        $response->assertViewHas('order_details');
    }


    #[Test]
    public function history_displays_view(): void
    {
        $orders = Order::factory()->count(3)->create();

        $response = $this->get(route('orders.history'));

        $response->assertOk();
        $response->assertViewIs('customer.orders.history');
        $response->assertViewHas('orders');
        $response->assertViewHas('order_details');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OrderController::class,
            'update',
            \App\Http\Requests\OrderUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $order = Order::factory()->create();
        $status = $this->faker->word();

        $response = $this->put(route('orders.update', $order), [
            'status' => $status,
        ]);

        $order->refresh();

        $response->assertRedirect(route('customer.orders.details'));

        $this->assertEquals($status, $order->status);
    }
}
