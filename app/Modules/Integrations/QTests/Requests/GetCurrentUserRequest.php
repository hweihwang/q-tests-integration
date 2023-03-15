<?php

declare(strict_types=1);

namespace TestAssignment\Integrations\QTests\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use TestAssignment\Integrations\QTests\Responses\GetCurrentUserResponse;

final class GetCurrentUserRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/me';
    }

    public function createDtoFromResponse(Response $response): GetCurrentUserResponse
    {
        return GetCurrentUserResponse::fromResponse($response);
    }
}
