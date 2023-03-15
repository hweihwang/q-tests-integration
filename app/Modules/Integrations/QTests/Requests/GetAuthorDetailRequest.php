<?php

declare(strict_types=1);

namespace TestAssignment\Integrations\QTests\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use TestAssignment\Integrations\QTests\Responses\GetAuthorDetailResponse;

final class GetAuthorDetailRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/authors/'.$this->id;
    }

    public function createDtoFromResponse(Response $response): GetAuthorDetailResponse
    {
        return GetAuthorDetailResponse::fromResponse($response);
    }
}
