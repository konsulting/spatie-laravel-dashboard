# Spatie.be Laravel Dashboard

## This package is now abandoned, with the introduction of a new more extendable dashboard by Spatie.

Packaged version of the [Spatie's Laravel Dashboard](https://github.com/spatie/dashboard.spatie.be). The aim is to allow this handsome dashboard to be pulled into other projects, or customised heavily while keeping the core code isolated.

We will offer this repo to Spatie for them to maintain, so it may not exist for too long here.

## Installation

With a new Laravel 5.6 app:

 - `composer require konsulting/spatie-laravel-dashboard`
 - `php artisan make:auth`
 - `php artisan migrate`
 - Add a user: perhaps use `php artisan tinker`
 - The `Spatie\\LaravelDashboard\\Providers\\DashboardServiceProvider` is now auto-registered.
 - Add the schedule to your console kernel. Add `(new \Spatie\LaravelDashboard\Console\DashboardSchedule($schedule))->handle();` to the `handle` method.
 - Add your pusher cluster settings to the `config/broadcasting.php` file
```php
'pusher' => [
    ...
    'options' => [
        'cluster' => 'eu',
        'secure' => true,
    ],
]
```
 - If using google calendar, you need a service account - add the json file with credentials to `storage/app/google-calendar/service-account-credentials.json`
 - Add the .env items you need from the `stubs/.env.example` for the services you want to use.

### For simple use
- `php artisan vendor:publish --provider=Spatie\\LaravelDashboard\\Providers\\DashboardServiceProvider --tag=basic`
- Start your queue listener and setup the Laravel scheduler.
- Open the dashboard in your browser, login and wait for the update events to fill the dashboard.

Simple customisations are possible through the config file (`config/dashboard.php`) and the dashboard view (`resources/views/vendor/dashboard/dashbooard.blade.php`).

If using any of these routes, you may need to explude them in your VerifyCsrfToken middleware.
```php
      protected $except = [
          '/webhook/github',
          '/pusher/authenticate',
          '/oh-dear-webhooks',
      ];
```

### To fully customise, it needs more work
You need to be comfortable with Vue and Laravel

- `php artisan vendor:publish --provider=Spatie\\LaravelDashboard\\Providers\\DashboardServiceProvider --tag=advanced`
- `npm run prod` to build the necessary files.

- You can override the schedule by using your own `Schedule` class instead
of `Spatie\LaravelDashboard\Console\DashboardSchedule($schedule)`.
- You can either add to the Dashboard Update command by listening for the `DashboardUpdated` event,
or by creating a new Command set in `Spatie\Console\UpdateDashboardCommandSet`

## License

This project and the Laravel framework are open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
