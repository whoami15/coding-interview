## Bulk Discount

### Description

You are tasked with implementing a checkout system for an online store. The store sells two products: Apples and Oatmeal. The pricing rules for these products are as follows:

We have two products:

| Code | Name                 | Price | Quantity | Bulk Threshold | Bulk Price |
|------|----------------------|-------|----------|----------------|------------|
| P-1  | Coffee Frappuccino   | 180   | 1        | 3              | 170        |
| P-2  | Ham & Cheese Toastie | 205   | 1        | 2              | 195        |

### Requirements

- If a customer buys 3 or more Coffee Frappuccino, the price of each Coffee Frappuccino drops to 170.
- If a customer buys 2 or more bags of Ham & Cheese Toastie, the price of each Ham & Cheese Toastie drops to 195.

### Test Case

If a customer adds 3 Coffee Frappuccino and 2 Ham & Cheese Toastie to the basket, the total price should be 900.

```php
$checkout = new CheckoutService();
$checkout->scan('P-1'); // Scan one Coffee Frappuccino
$checkout->scan('P-1'); // Scan another Coffee Frappuccino
$checkout->scan('P-1'); // Scan another Coffee Frappuccino
$checkout->scan('P-2'); // Scan a Ham & Cheese Toastie
$checkout->scan('P-2'); // Scan another Ham & Cheese Toastie
$checkout->total; // 900
```

Basket/Cart: P-1, P-1, P-1, P-2, P-2

Total: 900
