<?php

declare(strict_types=1);

namespace TestAssignment\Integrations\QTests\Responses;

use Saloon\Contracts\Response;
use TestAssignment\Integrations\QTests\Responses\ValueObjects\Author;
use TestAssignment\Integrations\QTests\Responses\ValueObjects\Book;

final readonly class GetAuthorDetailResponse
{
    public function __construct(
        public Author $author,
        public array $books,
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $data = $response->json();

        $author = Author::fromArray($data);

        $books = array_map(static fn ($book) => Book::fromArray($book), $data['books']);

        return new self(
            $author,
            $books
        );
    }
}
