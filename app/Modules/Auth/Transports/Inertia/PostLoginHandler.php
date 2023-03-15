<?php

declare(strict_types=1);

namespace TestAssignment\Auth\Transports\Inertia;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use TestAssignment\Integrations\QTests\Manager;
use Throwable;

final readonly class PostLoginHandler
{
    public function __invoke(
        Request $request,
        Manager $manager
    ): RedirectResponse {
        $email = (string) $request->get('email');
        $password = (string) $request->get('password');

        try {
            $response = $manager->login($email, $password);

            $token = $response->token;
        } catch (Throwable) {
            return redirect()->intended('/login');
        }

        if (empty($token)) {
            return redirect()->intended('/login');
        }

        $request->session()->put('token', $response->token);

        return redirect()->intended('/authors');
    }
}
