<?php

declare(strict_types=1);

namespace TestAssignment\Integrations\QTests\Connectors;

use Saloon\Http\Connector;

final class DefaultConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return 'https://symfony-skeleton.q-tests.com/api/v2';
    }
}
