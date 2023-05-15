<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;

class CheckoutService
{
    private array $productCodes = [
        [
            'code' => 'P-1',
            'name' => 'Coffee Frappuccino',
            'price' => 180,
            'quantity' => 1,
            'buy_one_get_one_free' => true,
        ],
        [
            'code' => 'P-2',
            'name' => 'Ham & Cheese Toastie',
            'price' => 205,
            'quantity' => 1,
            'buy_one_get_one_free' => false,
        ],
    ];

    private array $selectedProducts = [];

    public int $total = 0;

    public function scan(string $productCode): void
    {
        $product = $this->getProductByCode($productCode);

        if ($product) {
            if (! isset($this->selectedProducts[$productCode])) {
                $this->selectedProducts[$productCode] = [
                    'quantity' => 0,
                    'name' => $product['name'],
                    'price' => $product['price'],
                ];
            }

            $this->selectedProducts[$productCode]['quantity']++;

            $this->calculateTotal();
        }
    }

    private function getProductByCode(string $productCode): ?array
    {
        $filteredProducts = array_filter($this->productCodes, function ($product) use ($productCode) {
            return $product['code'] === $productCode;
        });

        return array_shift($filteredProducts) ?: null;
    }


    private function calculateTotal(): void
    {
        $this->total = Collection::make($this->selectedProducts)
            ->map(function ($productData, $productCode) {
                $product = $this->getProductByCode($productCode);

                if ($product) {
                    $price = $product['price'];
                    $quantity = $productData['quantity'];

                    $itemsToCharge = $product['buy_one_get_one_free']
                        ? floor($quantity / 2) + $quantity % 2
                        : $quantity;

                    return intval($itemsToCharge * $price);
                }

                return 0;
            })
            ->sum();
    }
}
