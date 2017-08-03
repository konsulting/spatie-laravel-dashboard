# Spatie.be Laravel Dashboard 

Packaged version of the [Spatie's Laravel Dashboard](https://github.com/spatie/dashboard.spatie.be). The aim is to allow this handsome dashboard to be pulled into other projects, or customised heavily while keeping the core code isolated. 

We will offer this repo to Spatie for them to maintain, so it may not exists for too long here.

## Installation

With a new laravel app...

 - `composer require konsulting/spatie-laravel-dashboard`
 - `php artisan make:auth`
 - `php artisan migrate`
 - Add a user: perhaps use `php artisan tinker`
 - Add the `Spatie\\LaravelDashboard\\Providers\\DashboardServiceProvider` to your `provider` in `config/app.php`
 - Add the schedule to your console kernel. Add `(new Spatie\LaravelDashboard\Console\Schedule($schedule))->handle();` to the `handle` method.
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

### To fully customise, it needs more work
You need to be comfortable with Vue and Laravel

- `php artisan vendor:publish --provider=Spatie\\LaravelDashboard\\Providers\\DashboardServiceProvider --tag=advanced`
- add babel.rc and all package.json reqt's (see the packages .babelrc and package.json)
- `npm run prod` to build the necessary files. 

- You can override the schedule by using your own `Schedule` class instead 
of `Spatie\LaravelDashboard\Console\Schedule($schedule`.
- You can either add to the Dashboard Update command by listening for the `DashboardUpdated` event, 
or by creating a new Command set in `Spatie\Console\UpdateDshboardCommandSet` 

## License

This project and the Laravel framework are open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
