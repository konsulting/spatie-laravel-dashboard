<?php

namespace Spatie\LaravelDashboard\Console;

use Illuminate\Contracts\Console\Kernel;

class UpdateDashboardCommandSet
{
    protected $kernel;

    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
    }

    public function __invoke()
    {
        $this->kernel->call('dashboard:fetch-github-totals');
        $this->kernel->call('dashboard:fetch-calendar-events');
        $this->kernel->call('dashboard:send-heartbeat');
        $this->kernel->call('dashboard:fetch-current-track');
        $this->kernel->call('dashboard:fetch-packagist-totals');
        $this->kernel->call('dashboard:fetch-npm-totals');
        $this->kernel->call('dashboard:fetch-tasks');
    }
}
