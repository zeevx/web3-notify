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

    'telegram-bot-api' => [
        'token' => env('TELEGRAM_BOT_TOKEN', '5127974001:AAEVxK_hg57q0lK8yJnPMWd04nuLgR5fD2U')
    ],

    'twitter' => [
        'consumer_key'    => env('TWITTER_CONSUMER_KEY','IZVu2QFDgPNdWdFv29kpui3ds'),
        'consumer_secret' => env('TWITTER_CONSUMER_SECRET','t9sbAhzyPErUjZH75N818jPRGFZOXL2oDKv1StR7W8z9lgjHt9'),
        'access_token'    => env('TWITTER_ACCESS_TOKEN','1495453303618031617-PvmF06UMB5n5ekcGIs27VEWEzgGdIc'),
        'access_secret'   => env('TWITTER_ACCESS_SECRET','itEjRhhGi8n9Uh2If98RILSXKU3glefQZS8NFntHfQ9Ac')
    ],

    'discord' => [
        'token' => 'OTQ1NDgxODI2MjUwNjc4MzAy.YhQykQ.SjwX1CIXEXf4SN4b0S6Gd_udrbg',
    ],

];
