## Buy One, Get One Free

### Description

You are tasked with implementing a "Buy One, Get One Free" feature in Laravel and PHP. The feature allows customers to purchase a specific product and receive another one of the same product for free. Your goal is to create a solution that can handle multiple products and their corresponding prices, quantities, and "Buy One, Get One Free" offers.

We have two products:

| Code | Name                 | Price | Quantity | Buy One Get One Free |
|------|----------------------|-------|----------|----------------------|
| P-1  | Coffee Frappuccino   | 180   | 1        | Yes                  |
| P-2  | Ham & Cheese Toastie | 205   | 1        | No                   |


### Requirements

If a customer purchases a product with the "Buy One Get One Free" offer, they will receive another one of the same product for free. If a customer purchases a product without the "Buy One Get One Free" offer, they will only receive one of the product.


### Test Case

```php
$checkout = new CheckoutService();
$checkout->scan('P-1'); // Scan one Coffee Frappuccino
$checkout->scan('P-1'); // Scan another Coffee Frappuccino
$checkout->scan('P-1'); // Scan another Coffee Frappuccino
$checkout->scan('P-2'); // Scan a Ham & Cheese Toastie
$checkout->scan('P-2'); // Scan another Ham & Cheese Toastie
$checkout->total; // 770
```

Basket/Cart: P-1, P-1, P-1, P-2, P-2

Total: 770
