@extends('layouts.app')
@section('title', __('menus.books'))
@section('content')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <td>{{__('books.row')}}</td>
                <td>{{__('books.name')}}</td>
                <td>{{__('books.pages')}}</td>
                <td>{{__('books.isbn')}}</td>
                <td>{{__('books.published_at')}}</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $indexKey=>$book)
            <tr>
                <td>{{ $indexKey+1 }}</td>
                <td><a href="books/{{$book->id}}">{{$book->name}}</a></td>
                <td>{{ $book->pages }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->published_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection