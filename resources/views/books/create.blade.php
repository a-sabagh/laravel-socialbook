@extends('layouts.app')
@section('title', __('menus.books'))
@section('content')
    <form action="{{ route('Book.store') }}" method="POST">
        @include('books.errors.store')
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="{{__('books.name')}}">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" id="pages" name="pages" value="{{old('pages')}}" placeholder="{{__('books.pages')}}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{old('isbn')}}" placeholder="{{__('books.isbn')}}">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" id="price" name="price" value="{{old('price')}}" placeholder="{{__('books.price')}}">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" id="published-at" name="published_at" value="{{old('published_at')}}" placeholder="{{__('books.published_at')}}">
        </div>
        <button type="submit" class="btn btn-primary">{{__('books.submit')}}</button>
    </form>
@endsection