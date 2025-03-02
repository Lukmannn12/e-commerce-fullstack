<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'midtrans' => [
        'merchant_id'    => env('MIDTRANS_MERCHANT_ID', 'G506053737'),
        'client_key'     => env('MIDTRANS_CLIENT_KEY', 'SB-Mid-client-9gK68xaH6ZG1ijmF'),
        'server_key'     => env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-_sqpMMALNNUTiL8m-XE4rz9u'),
        'is_production'  => env('MIDTRANS_PRODUCTION', false),
    ],

];
