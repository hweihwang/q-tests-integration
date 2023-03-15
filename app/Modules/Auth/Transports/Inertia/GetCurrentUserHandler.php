<?php

declare(strict_types=1);

namespace TestAssignment\Auth\Transports\Inertia;

use Inertia\Inertia;
use Inertia\Response;
use TestAssignment\Shared\Handlers\BaseAuthHandler;

final readonly class GetCurrentUserHandler extends BaseAuthHandler
{
    public function __invoke(): Response
    {
        $user = $this->getUser();

        return Inertia::render('Me', [
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'gender' => $user->gender,
                'active' => $user->active,
                'emailVerified' => $user->emailVerified,
            ],
        ]);
    }
}
