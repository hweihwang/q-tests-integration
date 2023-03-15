<?php

declare(strict_types=1);

namespace TestAssignment\Integrations\QTests\Responses\ValueObjects;

use Carbon\Carbon;

final readonly class Book
{
    public function __construct(
        public int $id,
        public string $title,
        public Carbon $releaseDate,
        public string $description,
        public string $isbn,
        public string $format,
        public int $pages,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            (int) $data['id'],
            $data['title'],
            Carbon::parse($data['release_date']),
            $data['description'],
            $data['isbn'],
            $data['format'],
            (int) $data['number_of_pages']
        );
    }
}
