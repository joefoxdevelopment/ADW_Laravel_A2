<?php

return [
    'twitter' => env('TWITTER_ACC'),
    'reddit' => env('REDDIT_ACC'),

    'facebook' => [
        'message' => [
            'token' => env('FB_MESS_TOKEN'),
            'profile' => env('FB_MESS_PROFILE'),
        ],
    ],
];
