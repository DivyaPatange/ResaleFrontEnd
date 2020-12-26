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
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],

    'facebook' => [
        'client_id' => '1132069833894612',
        'client_secret' => 'dfcabf639b1bfa6196bc1063e82022be',
        'redirect' => 'http://127.0.0.1:8000/auth/facebook/callback',
    ],

];
