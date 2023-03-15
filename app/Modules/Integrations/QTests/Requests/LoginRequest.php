<?php

declare(strict_types=1);

namespace TestAssignment\Integrations\QTests\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use TestAssignment\Integrations\QTests\Responses\LoginResponse;

final class LoginRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/token';
    }

    public function createDtoFromResponse(Response $response): LoginResponse
    {
        return LoginResponse::fromResponse($response);
    }
}
