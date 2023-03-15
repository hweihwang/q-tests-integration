<?php

declare(strict_types=1);

namespace TestAssignment\Author\Transports\Inertia;

use Inertia\Inertia;
use Inertia\Response;
use TestAssignment\Integrations\QTests\Responses\ValueObjects\Book;
use TestAssignment\Shared\Handlers\BaseAuthHandler;

final readonly class GetAuthorDetailHandler extends BaseAuthHandler
{
    public function __invoke(int $authorId): Response
    {
        $author = $this->manager->getAuthorDetail($authorId);

        $authorDetail = [
            'id' => $author->author->id,
            'firstName' => $author->author->firstName,
            'lastName' => $author->author->lastName,
            'birthday' => $author->author->birthday->toDateString(),
            'gender' => $author->author->gender,
            'placeOfBirth' => $author->author->placeOfBirth,
        ];

        $books = collect($author->books)
            ->sortByDesc('id')
            ->map(static fn (Book $book) => [
                'id' => $book->id,
                'title' => $book->title,
                'releaseDate' => $book->releaseDate->toDateString(),
                'description' => $book->description,
                'isbn' => $book->isbn,
                'format' => $book->format,
                'pages' => $book->pages,
            ])->values()->all();

        $canBeDeleted = 0 === count($books) ?? false;

        return Inertia::render('AuthorDetail', [
            'author' => $authorDetail,
            'books' => $books,
            'canBeDeleted' => $canBeDeleted,
            'currentUser' => $this->getUser(),
        ]);
    }
}
