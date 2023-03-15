<?php

declare(strict_types=1);

namespace TestAssignment\Author\Transports\Inertia;

use Inertia\Inertia;
use Inertia\Response;
use TestAssignment\Shared\Handlers\BaseAuthHandler;

final readonly class CreateAuthorPageHandler extends BaseAuthHandler
{
    public function __invoke(): Response
    {
        return Inertia::render('CreateAuthor', [
            'currentUser' => $this->getUser(),
        ]);
    }
}
