<?php
    return array(
        /*
        |--------------------------------------------------------------------------
        | Paytm Default Gateway
        |--------------------------------------------------------------------------
        | "sandbox" is for testing purpose
        | "live" is for production 
        |
        */
        'default'       => 'sandbox',

        /*
        |--------------------------------------------------------------------------
        | Paytm Aditional settings
        |--------------------------------------------------------------------------
        |
        */
        'industry_type' => 'Retail',
        'channel'       => 'WEB',
        'order_prefix'  => 'EDU',
        'website'       => 'whdticket.dev',

        /*
        |--------------------------------------------------------------------------
        | Paytm Connection Credentials
        |--------------------------------------------------------------------------
        | sandbox,live
        |
        */
        'connections' => [

            'sandbox' => [
                'merchant_key'  => 'dS1rN@o6r_nhWYL1',
                'merchant_mid'  => '2bonee48280159055733',
            ],

            'live' => [
                'merchant_key'  => 'your-merchant-key',
                'merchant_mid'  => 'your-merchant-id',
            ]

        ],
    );
