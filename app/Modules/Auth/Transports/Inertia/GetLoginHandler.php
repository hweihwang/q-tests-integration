<?php

declare(strict_types=1);

namespace TestAssignment\Auth\Transports\Inertia;

use Inertia\Inertia;
use Inertia\Response;

final readonly class GetLoginHandler
{
    public function __invoke(): Response
    {
        return Inertia::render('Login');
    }
}
