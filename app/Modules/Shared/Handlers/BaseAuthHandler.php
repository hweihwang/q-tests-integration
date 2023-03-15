<?php

declare(strict_types=1);

namespace TestAssignment\Shared\Handlers;

use TestAssignment\Integrations\QTests\Manager;
use TestAssignment\Shared\Concerns\CanBeAuthConcern;

abstract readonly class BaseAuthHandler
{
    use CanBeAuthConcern;

    public function __construct(protected Manager $manager)
    {
        $this->auth($manager);
    }
}
