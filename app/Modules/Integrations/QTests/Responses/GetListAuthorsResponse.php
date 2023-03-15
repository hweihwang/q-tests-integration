<?php

declare(strict_types=1);

namespace TestAssignment\Integrations\QTests\Responses;

use Saloon\Contracts\Response;
use TestAssignment\Integrations\QTests\Responses\ValueObjects\Author;

final readonly class GetListAuthorsResponse
{
    public function __construct(
        public array $authors,
        public int $currentPage,
        public int $perPage,
        public int $total,
        public int $lastPage
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $data = $response->json();

        $authors = array_map(static fn ($author) => Author::fromArray($author), $data['items']);

        return new self(
            $authors,
            $data['current_page'],
            $data['limit'],
            $data['total_results'],
            $data['total_pages']
        );
    }
}
