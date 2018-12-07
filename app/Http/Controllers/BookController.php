<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use Illuminate\Http\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public $currentRoute;

    public function __construct()
    {
        $this->middleware('auth')->only(['create']);
        $this->currentRoute = Route::currentRouteName();
    }

    public function index()
    {
        $books = Book::all();
        $currentRoute = $this->currentRoute;
        return view('books.index', compact('books', 'currentRoute'));
    }

    public function show($id)
    {
        $currentRoute = $this->currentRoute;
        $book = Book::findOrFail($id);
        return view('books.show', compact('book', 'currentRoute'));
    }

    public function create()
    {
        $currentRoute = $this->currentRoute;
        $categories = Category::all();
        $authors = Author::all();
        return view('books.create', compact('currentRoute', 'categories', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required|max:256',
            'pages' => 'integer|required',
            'isbn' => 'string|unique:books,isbn|required|size:10',
            'price' => 'integer|required',
            'published_at' => 'date|required',
        ]);
        $bookInputs = $request->only(['name', 'pages', 'isbn', 'price', 'published_at']);
        $categories = $request->input('categories');
        $authors = $request->input('authors');
        $book = Auth::user()->books()->create($bookInputs);
        $book->categories()->attach($categories);
        $book->authors()->attach($authors);
        return redirect('books');
    }

    public function edit(int $id)
    {
        $currentRoute = $this->currentRoute;
        $book = Book::findOrFail($id);
        $categories = Category::all();
        $authors = Author::all();
        return view('books.edit', compact('currentRoute', 'book', 'categories', 'authors'));
    }

    public function update(Request $request,int $id)
    {
        $request->validate([
            'name' => 'string|required|max:256',
            'pages' => 'integer|required',
            'isbn' => 'string|required|size:10',
            'price' => 'integer|required',
            'published_at' => 'date|required',
        ]);
        $bookInputs = $request->only(['name', 'pages', 'isbn', 'price', 'published_at']);
        $categories = $request->input('categories');
        $authors = $request->input('authors');
        $book = Book::findOrFail($id);
        $book->update($bookInputs);
        $book->categories()->sync($categories);
        $book->authors()->sync($authors);
        return redirect("books/{$id}");
    }
}
