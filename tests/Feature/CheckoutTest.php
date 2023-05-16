<?php

namespace Tests\Feature;

use App\Services\CheckoutService;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    public function test_calculate_total_with_bulk_discount(): void
    {
        $checkout = new CheckoutService();
        $checkout->scan('P-1'); // Scan one Coffee Frappuccino
        $checkout->scan('P-1'); // Scan another Coffee Frappuccino
        $checkout->scan('P-1'); // Scan another Coffee Frappuccino
        $checkout->scan('P-2'); // Scan a Ham & Cheese Toastie
        $checkout->scan('P-2'); // Scan another Ham & Cheese Toastie

        $this->assertEquals(900, $checkout->total);
    }
}
