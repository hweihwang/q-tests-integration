<?php

declare(strict_types=1);

namespace TestAssignment\Integrations\QTests\Responses;

use Saloon\Contracts\Response;
use TestAssignment\Integrations\QTests\Responses\ValueObjects\User;

final readonly class GetCurrentUserResponse
{
    public function __construct(
        public User $user
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $data = $response->json();

        return new self(User::fromArray($data));
    }
}
