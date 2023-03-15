<?php

declare(strict_types=1);

namespace TestAssignment\Author\Transports\Inertia;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use TestAssignment\Shared\Handlers\BaseAuthHandler;

final readonly class CreateAuthorHandler extends BaseAuthHandler
{
    public function __invoke(Request $request): RedirectResponse
    {
        $firstName = (string) $request->input('firstName');
        $lastName = (string) $request->input('lastName');
        $birthday = (string) $request->input('birthday');
        $gender = (string) $request->input('gender');
        $placeOfBirth = (string) $request->input('placeOfBirth');

        $this->manager->createAuthor(
            $firstName,
            $lastName,
            $birthday,
            $gender,
            $placeOfBirth
        );

        return redirect()->intended('/authors');
    }
}
