<?php

declare(strict_types=1);

namespace TestAssignment\Integrations\QTests;

use Carbon\Carbon;
use Saloon\Contracts\Connector;
use TestAssignment\Integrations\QTests\Requests\CreateAuthorRequest;
use TestAssignment\Integrations\QTests\Requests\CreateBookRequest;
use TestAssignment\Integrations\QTests\Requests\DeleteAuthorRequest;
use TestAssignment\Integrations\QTests\Requests\DeleteBookRequest;
use TestAssignment\Integrations\QTests\Requests\GetAuthorDetailRequest;
use TestAssignment\Integrations\QTests\Requests\GetCurrentUserRequest;
use TestAssignment\Integrations\QTests\Requests\GetListAuthorsRequest;
use TestAssignment\Integrations\QTests\Requests\LoginRequest;
use TestAssignment\Integrations\QTests\Responses\GetAuthorDetailResponse;
use TestAssignment\Integrations\QTests\Responses\GetCurrentUserResponse;
use TestAssignment\Integrations\QTests\Responses\GetListAuthorsResponse;
use TestAssignment\Integrations\QTests\Responses\LoginResponse;

final readonly class Manager
{
    public function __construct(private Connector $connector)
    {
    }

    public function login(
        string $email,
        string $password
    ): LoginResponse {
        $request = new LoginRequest();

        $request->body()->merge([
            'email' => $email,
            'password' => $password,
        ]);

        return $this->connector->send($request)->dtoOrFail();
    }

    public function getListAuthors(
        ?string $token = null
    ): GetListAuthorsResponse {
        $request = new GetListAuthorsRequest();

        $request->withTokenAuth($token ?? session('token'));

        return $this->connector->send($request)->dtoOrFail();
    }

    public function getAuthorDetail(
        int $id,
        ?string $token = null
    ): GetAuthorDetailResponse {
        $request = new GetAuthorDetailRequest($id);

        $request->withTokenAuth($token ?? session('token'));

        return $this->connector->send($request)->dtoOrFail();
    }

    public function deleteBook(
        int $id,
        ?string $token = null
    ): void {
        $request = new DeleteBookRequest($id);

        $request->withTokenAuth($token ?? session('token'));

        $this->connector->send($request);
    }

    public function createBook(
        int $authorId,
        string $title,
        string $description,
        string $isbn,
        string $format,
        int $pages,
        string $releaseDate,
        ?string $token = null
    ): void {
        $request = new CreateBookRequest();

        $request->withTokenAuth($token ?? session('token'));

        $request->body()->merge([
            'author' => [
                'id' => $authorId,
            ],
            'title' => $title,
            'description' => $description,
            'isbn' => $isbn,
            'format' => $format,
            'number_of_pages' => $pages,
            'releaseDate' => Carbon::parse($releaseDate),
        ]);

        $this->connector->send($request)->json();
    }

    public function createAuthor(
        string $firstName,
        string $lastName,
        string $birthday,
        string $gender,
        string $placeOfBirth,
        ?string $token = null
    ): void {
        $request = new CreateAuthorRequest();

        $request->withTokenAuth($token ?? session('token'));

        $request->body()->merge([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'birthday' => Carbon::parse($birthday),
            'gender' => $gender,
            'place_of_birth' => $placeOfBirth,
        ]);

        $this->connector->send($request)->json();
    }

    public function deleteAuthor(
        int $id,
        ?string $token = null
    ): void {
        $request = new DeleteAuthorRequest($id);

        $request->withTokenAuth($token ?? session('token'));

        $this->connector->send($request);
    }

    public function getCurrentUser(
        ?string $token = null
    ): GetCurrentUserResponse {
        $request = new GetCurrentUserRequest();

        $request->withTokenAuth($token ?? session('token'));

        return $this->connector->send($request)->dtoOrFail();
    }
}
