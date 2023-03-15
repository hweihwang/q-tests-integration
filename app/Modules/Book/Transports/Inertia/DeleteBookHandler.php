<?php

declare(strict_types=1);

namespace TestAssignment\Book\Transports\Inertia;

use Illuminate\Http\RedirectResponse;
use TestAssignment\Shared\Handlers\BaseAuthHandler;

final readonly class DeleteBookHandler extends BaseAuthHandler
{
    public function __invoke(int $bookId): RedirectResponse
    {
        $this->manager->deleteBook($bookId);

        return redirect()->back();
    }
}
