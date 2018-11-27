<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;


class BookController extends Controller
{
    public $currentRoute;

    public function __construct()
    {
        $this->currentRoute=Route::currentRouteName();
    }

    public function index()
    {
        $books=Book::all();
        $currentRoute=$this->currentRoute;
        return view('books.index',compact('books','currentRoute'));
    }

    public function show($id)
    {
        $currentRoute=$this->currentRoute;
        $book=Book::findOrFail($id);
        return view('books.show',compact('book','currentRoute'));
    }

    public function create()
    {
        $currentRoute = $this->currentRoute;
        return view('books.create',compact('currentRoute'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required|max:256',
            'pages' => 'integer|required',
            'isbn' => 'string|unique:books,isbn|required|size:10',
            'price' => 'integer|required',
            'published_at' => 'date|required'
        ]);
        $book = $request->except(['_token']);
        Book::create($book);
        return redirect('books');
    }
}
