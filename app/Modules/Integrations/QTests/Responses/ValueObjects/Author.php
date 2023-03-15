<?php

declare(strict_types=1);

namespace TestAssignment\Integrations\QTests\Responses\ValueObjects;

use Carbon\Carbon;

final readonly class Author
{
    public function __construct(
        public int $id,
        public string $firstName,
        public string $lastName,
        public Carbon $birthday,
        public string $gender,
        public string $placeOfBirth,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            (int) $data['id'],
            $data['first_name'],
            $data['last_name'],
            Carbon::parse($data['birthday']),
            $data['gender'],
            $data['place_of_birth']
        );
    }
}
