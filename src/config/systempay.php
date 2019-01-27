<?php

return 
[
    /**
     * Your website id
     */
    'id' => 'YOURE_SITE_ID',

    /**
     * Your key
     */
    'key' => env('SYSTEMPAY_KEY', 'YOUR_KEY'),
    
    /**
     * PRODUCTION or TEST
     */
    'mode' => env('SYSTEMPAY_MODE', 'PRODUCTION'),

    /**
     * Default params
     */
    'params' => 
    [
        'vads_page_action' => 'PAYMENT',
        'vads_action_mode' => 'INTERACTIVE',
        'vads_payment_config' => 'SINGLE',
        'vads_page_action' => 'PAYMENT',
        'vads_version' => 'V2',
        'vads_currency' => '978'
    ],

    //Systempay's url
    'url' => 'https://paiement.systempay.fr/vads-payment/',
];
