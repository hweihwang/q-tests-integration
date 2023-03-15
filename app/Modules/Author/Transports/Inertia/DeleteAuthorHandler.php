<?php

declare(strict_types=1);

namespace TestAssignment\Author\Transports\Inertia;

use Illuminate\Http\RedirectResponse;
use TestAssignment\Shared\Handlers\BaseAuthHandler;

final readonly class DeleteAuthorHandler extends BaseAuthHandler
{
    public function __invoke(int $authorId): RedirectResponse
    {
        $authorDetail = $this->manager->getAuthorDetail($authorId);

        if (count($authorDetail->books) > 0) {
            return redirect()->intended('/authors/'.$authorId);
        }

        $this->manager->deleteAuthor($authorId);

        return redirect()->intended('/authors');
    }
}
