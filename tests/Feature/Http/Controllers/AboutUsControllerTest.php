<?php

namespace Tests\Feature\Http\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AboutUsController
 */
final class AboutUsControllerTest extends TestCase
{
    #[Test]
    public function __invoke_displays_view(): void
    {
        $response = $this->get(route('about-us.__invoke'));

        $response->assertOk();
        $response->assertViewIs('customer.about.index');
    }
}
