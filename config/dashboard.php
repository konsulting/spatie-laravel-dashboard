<?php

return [
    // Which middleware should we use in the route for the dashboard?
    // auth, auth.basic, or something else
    'auth_middleware' => 'auth',

    // The list of service providers to register. Each has a specific role.
    // You can remove any of them and replace with your own version, or
    // So you can implement it differently (e.g. routes) if needed.
    'service_providers_to_register' => [
        \Spatie\LaravelDashboard\Providers\EventServiceProvider::class,
        \Spatie\LaravelDashboard\Providers\BroadcastServiceProvider::class,
        \Spatie\LaravelDashboard\Providers\PackageServiceProvider::class,
        \Spatie\LaravelDashboard\Providers\CollectionServiceProvider::class,
    ],

    // The node server address, if you are using it
    'node_server_address' => 'http://dashboard.spatie.be:6001',

    // Details for the services being used, allowing simple customisation
    'services' => [
        'github' => [
            'token' => env('GITHUB_TOKEN'),
            'files' => env('GITHUB_FILES'),
            'hook_secret' => env('GITHUB_HOOK_SECRET'),
            'username' => env('GITHUB_USERNAME', 'spatie'),
            'tasks' => [
                'repo' => 'tasks',
                'branch' => 'master',
            ],
        ],

        'last-fm' => [
            'api_key' => env('LAST_FM_API_KEY'),
            'users' => explode(',', env('LAST_FM_USERS')),
        ],

        'packagist' => [
            'vendor' => env('PACKAGIST_VENDOR'),
        ],

        'twitter' => [
            'listen_for_mentions' => [
                'spatie.be',
                '@spatie_be',
                'github.com/spatie',
            ]
        ],

        'ohdear-webhooks' => [
        /*
             * Oh dear will sign webhooks using a secret. You can find the secret used at the webhook
             * configuration settings: https://ohdearapp.com/xxxxxx
             */
            'signing_secret' => env('OH_DEAR_SIGNING_SECRET'),
        
            /*
             * Here you can define the job that should be run when a certain webhook hits your .
             * application.
             *
             * You can find a list of Oh dear webhook types here:
             * https://ohdearapp.com/xxxxxx
             */
            'jobs' => [
                // 'uptimeCheckFailed' => \App\Jobs\LaravelWebhooks\HandleFailedUptimeCheck::class,
                // 'uptimeCheckRecovered' => \App\Jobs\LaravelWebhooks\HandleRecoveredUptimeCheck::class,
                // ...
            ],
        ],
    ],
];
