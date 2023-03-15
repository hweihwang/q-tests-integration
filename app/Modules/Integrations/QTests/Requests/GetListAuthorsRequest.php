<?php

declare(strict_types=1);

namespace TestAssignment\Integrations\QTests\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use TestAssignment\Integrations\QTests\Responses\GetListAuthorsResponse;

final class GetListAuthorsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/authors';
    }

    protected function defaultQuery(): array
    {
        return [
            'direction' => 'DESC',
            'limit' => 100,
        ];
    }

    public function createDtoFromResponse(Response $response): GetListAuthorsResponse
    {
        return GetListAuthorsResponse::fromResponse($response);
    }
}
