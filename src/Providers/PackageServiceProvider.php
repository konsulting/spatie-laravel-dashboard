<?php

namespace Spatie\LaravelDashboard\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Spatie\LaravelDashboard\Services\GitHub\GitHubServiceProvider;
use Spatie\LaravelTwitterStreamingApi\TwitterStreamingApiFacade;
use Spatie\LaravelTwitterStreamingApi\TwitterStreamingApiServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    protected $providersToRegister = [
        GitHubServiceProvider::class,
        TwitterStreamingApiServiceProvider::class,
    ];

    protected $facadesToRegister = [
        'TwitterStreamingApi' => TwitterStreamingApiFacade::class,
    ];

    public function boot()
    {
        //
    }

    public function register()
    {
        $this->registerProviders();
        $this->registerFacades();
    }

    private function registerProviders()
    {
        collect($this->providersToRegister)->each(function ($provider) {
            $this->app->register($provider);
        });
    }

    private function registerFacades()
    {
        $loader = AliasLoader::getInstance();

        collect($this->providersToRegister)->each(function ($facade, $alias) use ($loader) {
            $loader->alias($alias, $facade);
        });
    }
}
