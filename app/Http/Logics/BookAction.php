<?php

namespace App\Http\Logics;

use App\Book;
use App\User;
use App\Events\BookCreated;

class BookAction
{

    public function __construct()
    {
        # code...
    }

    public function store(User $user ,array $data)
    {
        $bookInputs = array_only($data,['name', 'pages', 'isbn', 'price', 'published_at']);
        $categories = array_get($data,'categories');
        $authors = array_get($data,'authors');

        $result = $book = $user->books()->create($bookInputs);
        $book->categories()->attach($categories);
        $book->authors()->attach($authors);
        event(new BookCreated($user,$book));
        return ($result)? true : false;
    }

    public function update(Book $book,array $data)
    {
        $bookInputs = array_only($data,['name', 'pages', 'isbn', 'price', 'published_at']);
        $categories = array_get($data,'categories');
        $authors = array_get($data,'authors');

        $result = $book->update($bookInputs);
        $book->categories()->sync($categories);
        $book->authors()->sync($authors);

        return ($result)? true : false;
    }

    public function delete($book)
    {
        return $book->delete();
    }

}