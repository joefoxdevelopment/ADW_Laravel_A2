<?php

return [
    'twitter' => env('TWITTER_ACC'),
    'reddit' => env('REDDIT_ACC'),

    'discord' => [
        'webhook' => [
            'url' => env('DISCORD_WEBHOOK_URL'),
        ],
    ],
];
