<?php

add_hook('ShoppingCartValidateCheckout', 1, function($vars) {
    // Set the maximum number of items allowed in the cart
    $allow_items_quantity = 10;

    // Set the maximum quantity of a single product allowed in the cart
    $allow_product_quantity = 5;
    
    $orderfrm = new WHMCS\OrderForm();

    if ($orderfrm->getNumItemsInCart() > $allow_items_quantity) {
        return [
            'You can only order up to ' . $allow_items_quantity . ' items.'
        ];
    }

    $cartData = $orderfrm->getCartData();

    foreach ($cartData['products'] as $key => $product) {
        if ($product['qty'] > $allow_product_quantity) {
            return [
                'You can only order up to ' . $allow_product_quantity . ' of single product.'
            ];
        }
    }
});