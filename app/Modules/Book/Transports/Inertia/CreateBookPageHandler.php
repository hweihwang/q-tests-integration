<?php

declare(strict_types=1);

namespace TestAssignment\Book\Transports\Inertia;

use Inertia\Inertia;
use Inertia\Response;
use TestAssignment\Shared\Handlers\BaseAuthHandler;

final readonly class CreateBookPageHandler extends BaseAuthHandler
{
    public function __invoke(): Response
    {
        $authors = $this->manager->getListAuthors()->authors;

        return Inertia::render('CreateBook', [
            'authors' => $authors,
            'currentUser' => $this->getUser(),
        ]);
    }
}
