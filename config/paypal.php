<?php 

return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'),

    'sandbox' => [
        'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID', ''),
        'client_secret'     => env('PAYPAL_SANDBOX_CLIENT_SECRET', ''),
        'app_id'            => 'APP-80W284485P519543T',
    ],

    'live' => [
        'client_id'         => env('PAYPAL_LIVE_CLIENT_ID', ''),
        'client_secret'     => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
        'app_id'            => '',
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'),
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url'     => env('PAYPAL_NOTIFY_URL', ''),
    'locale'         => env('PAYPAL_LOCALE', 'en_US'),
    'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true),
];
//return [ 
//    'client_id' => env('PAYPAL_CLIENT_ID',''),
//    'secret' => env('PAYPAL_SECRET',''),
//    'settings' => array(
//        'mode' => env('PAYPAL_MODE','sandbox'),
//        'http.ConnectionTimeOut' => 30,
//        'log.LogEnabled' => true,
//        'log.FileName' => storage_path() . '/logs/paypal.log',
//        'log.LogLevel' => 'ERROR'
//    ),
//];
?>