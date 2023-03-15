<?php

declare(strict_types=1);

namespace TestAssignment\Integrations\QTests\Responses\ValueObjects;

final readonly class User
{
    public function __construct(
        public int $id,
        public string $email,
        public string $firstName,
        public string $lastName,
        public string $gender,
        public bool $active,
        public bool $emailVerified,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            (int) $data['id'],
            (string) $data['email'],
            (string) $data['first_name'],
            (string) $data['last_name'],
            (string) $data['gender'],
            (bool) $data['active'],
            (bool) $data['email_confirmed'],
        );
    }
}
