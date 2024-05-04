<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\CartItem;
use App\Models\ProductVariant;
use App\Models\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CartItemController
 */
final class CartItemControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $cartItems = CartItem::factory()->count(3)->create();

        $response = $this->get(route('cart-items.index'));

        $response->assertOk();
        $response->assertViewIs('customer.cart.index');
        $response->assertViewHas('cartItems');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CartItemController::class,
            'store',
            \App\Http\Requests\CartItemStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $session = Session::factory()->create();
        $product_variant = ProductVariant::factory()->create();
        $quantity = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('cart-items.store'), [
            'session_id' => $session->id,
            'product_variant_id' => $product_variant->id,
            'quantity' => $quantity,
        ]);

        $cartItems = CartItem::query()
            ->where('session_id', $session->id)
            ->where('product_variant_id', $product_variant->id)
            ->where('quantity', $quantity)
            ->get();
        $this->assertCount(1, $cartItems);
        $cartItem = $cartItems->first();

        $response->assertRedirect(route('customer.cart.index'));
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CartItemController::class,
            'update',
            \App\Http\Requests\CartItemUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $cartItem = CartItem::factory()->create();
        $session = Session::factory()->create();
        $product_variant = ProductVariant::factory()->create();
        $quantity = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('cart-items.update', $cartItem), [
            'session_id' => $session->id,
            'product_variant_id' => $product_variant->id,
            'quantity' => $quantity,
        ]);

        $cartItem->refresh();

        $response->assertRedirect(route('customer.cart.index'));

        $this->assertEquals($session->id, $cartItem->session_id);
        $this->assertEquals($product_variant->id, $cartItem->product_variant_id);
        $this->assertEquals($quantity, $cartItem->quantity);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $cartItem = CartItem::factory()->create();

        $response = $this->delete(route('cart-items.destroy', $cartItem));

        $response->assertRedirect(route('customer.cart.index'));

        $this->assertModelMissing($cartItem);
    }
}
