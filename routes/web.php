<?php

Route::group([
    'namespace' => '\\Spatie\\LaravelDashboard\\Http\\Controllers',
    'middleware' => ['web']
], function () {
    Route::get('/dashboard', 'DashboardController@index')
        ->middleware(config('dashboard.auth_middleware', 'auth'))
        ->name('dashboard');

    Route::post('/webhook/github', 'GitHubWebhookController@gitRepoReceivedPush');

    // Oh dear package registers this macro in the boot() method of the service provider.
    // Which may not have occurred before we register these routes
    // Route::ohDearWebhooks('/oh-dear-webhooks');
    // So we'll do it manually for now

    Route::post('/oh-dear-webhooks', '\OhDear\LaravelWebhooks\OhDearWebhooksController');
});

