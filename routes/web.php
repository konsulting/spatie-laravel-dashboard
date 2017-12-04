<?php

Route::group([
    'namespace' => '\\Spatie\\LaravelDashboard\\Http\\Controllers',
    'middleware' => ['web']
], function () {
    Route::get('/dashboard', 'DashboardController@index')
        ->middleware(config('dashboard.auth_middleware', 'auth'))
        ->name('dashboard');

    Route::post('/webhook/github', 'GitHubWebhookController@gitRepoReceivedPush');

    Route::ohDearWebhooks('/oh-dear-webhooks');
});

