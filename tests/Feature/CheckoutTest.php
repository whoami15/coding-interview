<?php

namespace Tests\Feature;

use App\Services\CheckoutService;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    public function test_scan_single_item(): void
    {
        $checkout = new CheckoutService();
        $checkout->scan('P-1');
        $checkout->total;

        $this->assertEquals(180, $checkout->total);
    }

    public function test_scan_multiple_items(): void
    {
        $checkout = new CheckoutService();
        $checkout->scan('P-1');
        $checkout->scan('P-1');
        $checkout->scan('P-1');
        $checkout->scan('P-2');
        $checkout->scan('P-2');

        $this->assertEquals(770, $checkout->total);
    }
}
