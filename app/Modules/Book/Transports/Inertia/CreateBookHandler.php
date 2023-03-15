<?php

declare(strict_types=1);

namespace TestAssignment\Book\Transports\Inertia;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use TestAssignment\Shared\Handlers\BaseAuthHandler;

final readonly class CreateBookHandler extends BaseAuthHandler
{
    public function __invoke(Request $request): RedirectResponse
    {
        $authorId = (int) $request->get('authorId');
        $title = (string) $request->get('title');
        $description = (string) $request->get('description');
        $isbn = (string) $request->get('isbn');
        $format = (string) $request->get('format');
        $pages = (int) $request->get('pages');
        $releaseDate = (string) $request->get('releaseDate');

        $this->manager->createBook(
            $authorId,
            $title,
            $description,
            $isbn,
            $format,
            $pages,
            $releaseDate
        );

        return redirect()->intended('/authors/'.($authorId ?: ''));
    }
}
