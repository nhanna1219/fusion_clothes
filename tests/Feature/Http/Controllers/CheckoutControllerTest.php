<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CheckoutController
 */
final class CheckoutControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $response = $this->get(route('checkouts.index'));

        $response->assertOk();
        $response->assertViewIs('customer.checkout.index');
        $response->assertViewHas('cart_items');
        $response->assertViewHas('product_variants');
    }


    #[Test]
    public function confirmation_displays_view(): void
    {
        $response = $this->get(route('checkouts.confirmation'));

        $response->assertOk();
        $response->assertViewIs('customer.checkout.confirmation');
        $response->assertViewHas('user_addresses');
        $response->assertViewHas('sessions');
        $response->assertViewHas('users');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CheckoutController::class,
            'store',
            \App\Http\Requests\CheckoutStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('checkouts.store'));

        $response->assertRedirect(route('customer.checkout.friendlyThanks'));

        $this->assertDatabaseHas(userAddresses, [ /* ... */ ]);
    }
}
