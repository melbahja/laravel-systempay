<?php

return [

    'YOUR_SITE_ID' => [
        'key' => 'YOUR_KEY',
        'env' => 'PRODUCTION',
        'params' => [
            //Put here your generals payment call parameters
            'vads_page_action' => 'PAYMENT',
            'vads_action_mode' => 'INTERACTIVE',
            'vads_payment_config' => 'SINGLE',
            'vads_page_action' => 'PAYMENT',
            'vads_version' => 'V2',
            'vads_currency' => '978'
        ]
    ],
    //Systempay's url
    'url' => 'https://paiement.systempay.fr/vads-payment/',

];
