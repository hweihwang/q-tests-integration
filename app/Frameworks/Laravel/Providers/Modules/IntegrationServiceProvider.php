<?php

declare(strict_types=1);

namespace Frameworks\Laravel\Providers\Modules;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Saloon\Contracts\Connector;
use TestAssignment\Integrations\QTests\Connectors\DefaultConnector;
use TestAssignment\Integrations\QTests\Manager;

final class IntegrationServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Connector::class, fn () => new DefaultConnector());

        $this->app->singleton(Manager::class, fn () => new Manager($this->app->get(Connector::class)));
    }
}
