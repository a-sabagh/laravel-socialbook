<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
}
