<?php

namespace Spatie\LaravelDashboard\Services\OhDearWebhooks;

use Illuminate\Events\Dispatcher;
use OhDear\LaravelWebhooks\OhDearWebhookCall;
use Spatie\LaravelDashboard\Events\Uptime\UptimeCheckFailed;
use Spatie\LaravelDashboard\Events\Uptime\UptimeCheckRecovered;

class EventSubscriber
{
    public function onUptimeCheckFailed(OhDearWebhookCall $ohDearWebhookCall)
    {
        $site = $ohDearWebhookCall->site();

        event(new UptimeCheckFailed($site['id'], $site['url']));
    }

    public function onUptimeCheckRecovered(OhDearWebhookCall $ohDearWebhookCall)
    {
        $site = $ohDearWebhookCall->site();

        event(new UptimeCheckRecovered($site['id'], $site['url']));
    }

    public function subscribe(Dispatcher $events)
    {
        $events->listen(
            'ohdear-webhooks::uptimeCheckFailed',
            'Spatie\LaravelDashboard\Services\OhDearWebhooks\EventSubscriber@onUptimeCheckFailed'
        );

        $events->listen(
            'ohdear-webhooks::uptimeCheckRecovered',
            'Spatie\LaravelDashboard\Services\OhDearWebhooks\EventSubscriber@onUptimeCheckRecovered'
        );
    }
}