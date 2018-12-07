@extends('layouts.app') 
@section('title', __('menus.edit')) 
@section('content')
<form action="{{ route('Book.update',['id'=>$book->id]) }}" method="POST">
    @include('books.errors.store') {{ csrf_field() }} @method('PATCH')
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" value="{{$book->name}}" placeholder="{{__('books.name')}}">
    </div>
    <div class="form-group">
        <input type="number" class="form-control" id="pages" name="pages" value="{{$book->pages}}" placeholder="{{__('books.pages')}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="isbn" name="isbn" value="{{$book->isbn}}" placeholder="{{__('books.isbn')}}">
    </div>
    <div class="form-group">
        <input type="number" class="form-control" id="price" name="price" value="{{$book->price}}" placeholder="{{__('books.price')}}">
    </div>
    <div class="form-group">
        <input type="date" class="form-control" id="published-at" name="published_at" value="{{$book->published_at}}" placeholder="{{__('books.published_at')}}">
    </div>
    <div class="form-group">
        <select name="categories[]" id="categories" class="form-control" multiple>
                @foreach ($categories as $category)
                <option {{($book->categories()->get()->contains('id',$category->id))? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
    </div>
    <div class="form-group">
        <select name="authors[]" id="authors" class="form-control" multiple="multiple">
                @foreach ($authors as $author)
                <option {{$book->authors()->get()->contains('id',$author->id)? 'selected' : ''}} value=" {{$author->id}} "> {{$author->name}} </option>
                @endforeach
            </select>
    </div>
    <button type="submit" class="btn btn-primary">{{__('books.update')}}</button>
</form>
@endsection