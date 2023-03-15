<?php

declare(strict_types=1);

namespace TestAssignment\Author\Transports\Inertia;

use Inertia\Inertia;
use Inertia\Response;
use TestAssignment\Integrations\QTests\Responses\ValueObjects\Author;
use TestAssignment\Shared\Handlers\BaseAuthHandler;

final readonly class GetListAuthorsHandler extends BaseAuthHandler
{
    public function __invoke(): Response
    {
        $authors = $this->manager->getListAuthors();

        $paging = [
            'currentPage' => $authors->currentPage,
            'perPage' => $authors->perPage,
            'total' => $authors->total,
            'lastPage' => $authors->lastPage,
        ];

        $authors = collect($authors->authors)->map(static fn (Author $author) => [
            'id' => $author->id,
            'firstName' => $author->firstName,
            'lastName' => $author->lastName,
            'birthday' => $author->birthday->toDateString(),
            'gender' => $author->gender,
            'placeOfBirth' => $author->placeOfBirth,
        ])->values()->all();

        return Inertia::render('Authors', [
            'authors' => $authors,
            'paging' => $paging,
            'currentUser' => $this->getUser(),
        ]);
    }
}
