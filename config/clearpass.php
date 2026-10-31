<?php

return [
    // The ClearPass server, without /api: https://clearpass.example.com
    'base_url' => env('CLEAR_PASS_BASE_URL'),

    // An API client (Administration > API Services > API Clients) that uses the client credentials grant.
    'client_id' => env('CLEAR_PASS_ID'),
    'client_secret' => env('CLEAR_PASS_SECRET'),

    // Other servers, used with ClearPass::connection('name'):
    // 'connections' => [
    //     'other' => [
    //         'base_url' => env('CLEAR_PASS_OTHER_BASE_URL'),
    //         'client_id' => env('CLEAR_PASS_OTHER_ID'),
    //         'client_secret' => env('CLEAR_PASS_OTHER_SECRET'),
    //     ],
    // ],
    'connections' => [],

    'timeouts' => [
        'connect' => env('CLEAR_PASS_CONNECT_TIMEOUT', 10),
        'request' => env('CLEAR_PASS_REQUEST_TIMEOUT', 30),
    ],

    'retries' => [
        'times' => env('CLEAR_PASS_RETRIES'),
        'interval_ms' => 500,
    ],

    // Fetch a new token and send the request again, once, when ClearPass answers 401 to it.
    'reauthenticate' => true,

    'cache' => [
        'enabled' => env('CLEAR_PASS_CACHE', false),
        'store' => env('CLEAR_PASS_CACHE_STORE'),
        'seconds' => 3600,
    ],

    'pagination' => [
        // Records per page when paging through a list with all(), lazy() or paginate(); ClearPass allows up to 1000.
        'per_page' => 100,
    ],
];
