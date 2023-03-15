<?php

declare(strict_types=1);

namespace TestAssignment\Auth\Transports\Inertia;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final readonly class LogoutHandler
{
    public function __invoke(Request $request): RedirectResponse
    {
        $request->session()->forget('token');

        return redirect()->intended('/login');
    }
}
