@extends('layouts.app') 
@section('title', __('menus.books')) 
@section('content')
<form action="{{ route('Book.store') }}" method="POST">
    @include('books.errors.store') {{ csrf_field() }}
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
    <div class="form-group">
        <select name="categories[]" id="categories" class="form-control" multiple>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
    </div>
    <div class="rng-cat-browse form-group">
        <label class="cat-label btn btn-default add-category" id="add-category">
			{{__("books.addCategory")}}
		</label>
        <input type="text" id="category-name" class="cat-holder">
        <span class="clear-file">&#10006;</span>
    </div>
    <div class="form-group">
        <select name="authors[]" id="authors" class="form-control" multiple="multiple">
                @foreach ($authors as $author)
                <option value=" {{$author->id}} "> {{$author->name}} </option>
                @endforeach
            </select>
    </div>
    <button type="submit" class="btn btn-primary">{{__('books.submit')}}</button>
</form>
@endsection

@section('script')
$(document).ready(function(){
    $(".clear-file").click(function () {
        var file_holder = $(this).prev(".cat-holder").val("");
    });
    $("#add-category").on('click',function(){
        var categoryName = $(this).next("#category-name").val();
        $.ajax({
            url: "/categories/create",
            type: "post",
            data: {
                "_token" : "{{ csrf_token() }}",
                "name" : categoryName
            },
            success: function(Response)
            {
                $output = "<option value='" + Response.id + "'>" + Response.name + "</option>";
                $("#categories").prepend($output);
                $("#category-name").val('');
            }

        });
    });
});
@endsection