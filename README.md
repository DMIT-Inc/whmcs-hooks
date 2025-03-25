# whmcs-hooks
Some useful hooks designed by DMIT for WHMCS

### CancelSubscription.php

Cancel Subscriptions (like PayPal) when perform refund/cancel/change gateway of the invoices.
1. Upload `CancelSubscription.php` to your whmcs hooks directory, e.g. `/yourwhmcsdir/includes/hooks/`
2. Turn on `Automatic Subscription Management` in your WHMCS settings, `Settings->Invoice->Automatic Subscription Management`

### OrderItemLimiter.php

Limit the number of items and product that can be ordered in a single order.
1. Upload `OrderItemLimiter.php` to your whmcs hooks directory, e.g. `/yourwhmcsdir/includes/hooks/`
2. Set the limit in the hook file, e.g. `$allow_items_quantity = 10;` and `$allow_product_quantity = 5;`
3. You can modify the error message according to your actual needs.


#### We have developed a number of useful modules, take a look at [https://dmit.dev/marketplace](https://dmit.dev/marketplace).