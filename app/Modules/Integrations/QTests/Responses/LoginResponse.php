<?php

declare(strict_types=1);

namespace TestAssignment\Integrations\QTests\Responses;

use Saloon\Contracts\Response;

final readonly class LoginResponse
{
    public function __construct(
        public string $token
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $data = $response->json();

        return new self($data['token_key']);
    }
}
