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
        'website'       => 'WEB_STAGING',        

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
                'merchant_key'  => 'I2k@k4reQICX_ydb',
                'merchant_mid'  => 'ecapso25803131227137',
            ]

        ],
    );
