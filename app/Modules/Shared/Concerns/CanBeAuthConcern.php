<?php

declare(strict_types=1);

namespace TestAssignment\Shared\Concerns;

use TestAssignment\Integrations\QTests\Manager;
use TestAssignment\Integrations\QTests\Responses\ValueObjects\User;
use Throwable;

trait CanBeAuthConcern
{
    private readonly User $user;

    private function redirectToLogin(): void
    {
        redirect()->intended('login')->send();
    }

    private function auth(Manager $manager): void
    {
        try {
            $this->user = $manager->getCurrentUser()->user;
        } catch (Throwable) {
            $this->redirectToLogin();
        }
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
