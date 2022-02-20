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
        'consumer_key'    => env('TWITTER_CONSUMER_KEY','JBddAhs5uGgRxb2V9d2mzeyYL'),
        'consumer_secret' => env('TWITTER_CONSUMER_SECRET','qNWSwhGtNoeHAw0oWulRtmSw9urL6S1mWNJCyfVdBCpfwDG70Z'),
        'access_token'    => env('TWITTER_ACCESS_TOKEN','2824500543-lpPGsMdFZPJZqyEcxv4rPtHeaFBgeBITPJed0M9'),
        'access_secret'   => env('TWITTER_ACCESS_SECRET','BEmZIfzDDhtOWXIh8wOE6yS8NpUg66y1feaeqWugdiw5W')
    ],

    'discord' => [
        'token' => 'YOUR_API_TOKEN',
    ],

];
