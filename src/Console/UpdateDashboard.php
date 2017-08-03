<?php

namespace Spatie\LaravelDashboard\Console;

use Illuminate\Console\Command;
use Spatie\LaravelDashboard\Events\DashboardUpdated;

class UpdateDashboard extends Command
{
    protected $signature = 'dashboard:update';

    protected $description = 'Update all components displayed on the dashboard.';

    public function handle()
    {
        $commandSet = config('dashboard.update_command_set', UpdateDashboardCommandSet::class);
        $commandSet();

        event(new DashboardUpdated);
    }
}
