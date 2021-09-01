<?php

use WHMCS\Database\Capsule;
use WHMCS\Exception;

function cancelSubscription($invoiceid)
{
    // Get all charges for the current invoice of type Hosting
    $currentInvoiceCharges = Capsule::table('tblinvoiceitems')->where('type', 'Hosting')->where('invoiceid', $invoiceid)->get();

    foreach ($currentInvoiceCharges as $key => $value) {
        // Get service information
        $serviceInfo = Capsule::table('tblhosting')->where('id', $value->relid)->first();
        // If a subscription ID exists
        if ($serviceInfo->subscriptionid) {
            // Execute cancel subscription operation
            try {
                cancelSubscriptionForService($serviceInfo->id);
            } catch (Exception $e) {
                logActivity('Service #' . $serviceInfo->id . ' cancel subscription has failed, reason: ' . $e->getMessage(), 0);
            }
        }
    }
}

// Invoice Refuned
add_hook('InvoiceRefunded', 1, function($vars) {
    cancelSubscription($vars['invoiceid']);
});
// Invoice Cancelled
add_hook('InvoiceCancelled', 1, function($vars) {
    cancelSubscription($vars['invoiceid']);
});
// Invoice Change Payment Gateway
add_hook('InvoiceChangeGateway', 1, function($vars) {
    cancelSubscription($vars['invoiceid']);
});