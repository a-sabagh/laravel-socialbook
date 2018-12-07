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
            <td>{{__('books.price')}}</td>
            <td>{{__('books.published_at')}}</td>
            <td>{{__('books.userOwner')}}</td>
            <td>{{__('general.edit')}}</td>

        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="books/{{$book->id}}">{{$book->name}}</a></td>
            <td>{{ $book->pages }}</td>
            <td>{{ $book->isbn }}</td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->published_at }}</td>
            <td>{{ $book->user->name }}</td>
            <td><a href="{{ route('Book.edit',['id'=>$book->id]) }}" class="btn btn-info">{{__('general.edit')}}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('Book.create') }}" type="button" class="btn btn-success btn-block">{{__("books.create")}}</a>
@endsection