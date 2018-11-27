@extends('layouts.app')
@section('title', __('menus.books'))
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $book->name}}
        </div>
        <div class="card-body">
            <p class="card-text">{{__('books.pages') . " : " . $book->pages}}</p>
            <p class="card-text">{{__('books.isbn')  . " : " .  $book->isbn}}</p>
            <p class="card-text">{{__('books.price')  . " : " .  $book->price}}</p>
            <p class="card-text">{{__('books.published_at')  . " : " .  $book->published_at}}</p>
        </div>
    </div>
@endsection