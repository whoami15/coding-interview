<?php

namespace App\Services;

use Illuminate\Support\Collection;

class CheckoutService
{
    private Collection $products;

    private Collection $selectedProducts;

    public int $total;

    public function __construct()
    {
        $this->products = collect([
            'P-1' => [
                'name' => 'Apple',
                'price' => 180,
                'bulkThreshold' => 3,
                'bulkPrice' => 170,
            ],
            'P-2' => [
                'name' => 'Oatmeal',
                'price' => 205,
                'bulkThreshold' => 2,
                'bulkPrice' => 195,
            ],
        ]);

        $this->selectedProducts = collect();

        $this->total = 0;
    }

    public function scan($productCode): void
    {
        $this->selectedProducts->push($productCode);

        $this->calculateTotal();
    }

    private function calculateTotal(): void
    {
        $this->total = $this->selectedProducts
            ->countBy()
            ->map(function ($count, $productCode) {
                return [
                    'productCode' => $productCode,
                    'count' => $count,
                ];
            })
            ->filter(function ($product) {
                return $this->products->has($product['productCode']);
            })
            ->map(function ($product) {
                $price = $this->products[$product['productCode']]['price'];
                $count = $product['count'];

                if ($count >= $this->products[$product['productCode']]['bulkThreshold']) {
                    $price = $this->products[$product['productCode']]['bulkPrice'];
                }

                return $price * $count;
            })
            ->sum();
    }
}
