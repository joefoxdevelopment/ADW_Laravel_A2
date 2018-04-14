<?php

return [
    'github'   => env('GITHUB_ACC'),
    'linkedin' => env('LINKEDIN_ACC'),
    'reddit'   => env('REDDIT_ACC'),
    'twitter'  => env('TWITTER_ACC'),

    'discord' => [
        'webhook' => [
            'url'      => env('DISCORD_WEBHOOK_URL'),
            'bot_name' => env('DISCORD_BOT_NAME'),
        ],
    ],
];
