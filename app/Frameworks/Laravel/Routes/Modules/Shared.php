<?php

use Illuminate\Support\Facades\Route;
use TestAssignment\Auth\Transports\Inertia\GetCurrentUserHandler;
use TestAssignment\Auth\Transports\Inertia\GetLoginHandler;
use TestAssignment\Auth\Transports\Inertia\LogoutHandler;
use TestAssignment\Auth\Transports\Inertia\PostLoginHandler;
use TestAssignment\Author\Transports\Inertia\CreateAuthorHandler;
use TestAssignment\Author\Transports\Inertia\CreateAuthorPageHandler;
use TestAssignment\Author\Transports\Inertia\DeleteAuthorHandler;
use TestAssignment\Author\Transports\Inertia\GetAuthorDetailHandler;
use TestAssignment\Author\Transports\Inertia\GetListAuthorsHandler;
use TestAssignment\Book\Transports\Inertia\CreateBookHandler;
use TestAssignment\Book\Transports\Inertia\CreateBookPageHandler;
use TestAssignment\Book\Transports\Inertia\DeleteBookHandler;

Route::group(['middleware' => ['web']], static function () {
    Route::get('/authors', GetListAuthorsHandler::class);
    Route::post('/authors', CreateAuthorHandler::class);
    Route::get('/authors/create', CreateAuthorPageHandler::class);
    Route::get('/authors/{authorId}', GetAuthorDetailHandler::class);
    Route::delete('/authors/{authorId}', DeleteAuthorHandler::class);

    Route::delete('/books/{bookId}', DeleteBookHandler::class);
    Route::get('/books/create', CreateBookPageHandler::class);
    Route::post('/books', CreateBookHandler::class);

    Route::get('/login', GetLoginHandler::class);
    Route::post('/login', PostLoginHandler::class);
    Route::post('/logout', LogoutHandler::class);

    Route::get('/me', GetCurrentUserHandler::class);
});
