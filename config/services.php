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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '73906380350-qjhm365lbb8r3cnmiifh1rekavoi0pkl.apps.googleusercontent.com',
        'client_secret' => 'Nt_FaLM0Qgk6rysEhVt8Q0in',
        'redirect' => 'https://resale99.com/auth/google/callback',
    ],

    'facebook' => [
        'client_id' => '4914858558586977',
        'client_secret' => '44a7205fd5febd97f3738dd650d736e9',
        'redirect' => 'https://resale99.com/auth/facebook/callback',
    ],

];
