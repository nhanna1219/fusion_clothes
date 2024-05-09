<?php

namespace Tests\Feature\Http\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HomeController
 */
final class HomeControllerTest extends TestCase
{
    #[Test]
    public function index_displays_view(): void
    {
        $response = $this->get(route('homes.index'));

        $response->assertOk();
        $response->assertViewIs('customer.home.index');
        $response->assertViewHas('products');
    }
}
