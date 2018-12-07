@extends('layouts.app') 
@section('title', __('menus.books')) 
@section('content')
<div class="card">
    <div class="card-header">
        {{ $book->name}}
    </div>
    <div class="card-body">
        <p class="card-text">{{__('books.pages') . " : " . $book->pages}}</p>
        <p class="card-text">{{__('books.isbn') . " : " . $book->isbn}}</p>
        <p class="card-text">{{__('books.price') . " : " . $book->price}}</p>
        <p class="card-text">{{__('books.categories')}}</p>
        <ul class="category-list">
            @foreach ($book->categories as $category)
            <li>{{$category->name}}</li>
            @endforeach
        </ul>
        <p class="card-text">{{__("books.authors")}}</p>
        <ul class="author-list">
            @foreach ($book->authors as $author)
            <li>{{$author->name}}</li>
            @endforeach
        </ul>
        <p class="card-text">{{__('books.published_at') . " : " . $book->published_at}}</p>
        <p class="card-text">{{__('books.userOwner') . " : " . $book->user->name}}</p>
    </div>
</div>
@endsection