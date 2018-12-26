<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Logics\BookAction;
use App\Http\Requests\StoreBook;
use App\Http\Requests\UpdateBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBook $request, BookAction $action)
    {
        $user = auth('api')->user();
        $result = $action->store($user, $request->all());
        if ($result) {
            return response()->json(['message' => 'successfull'], 200);
        } else {
            return response()->json(['message' => 'fail']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return Book::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBook $request, int $id, BookAction $action)
    {
        $book = Book::findOrFail($id);
        $user = auth('api')->user();

        $this->authorize('update',$book);
        $result = $action->update($book, $request->all());
        if ($result) {
            return response()->json(['message' => 'successfull'], 200);
        } else {
            return response()->json(['message' => 'fail']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookAction $action, int $id)
    {
        $book = Book::findOrFail($id);
        $this->authorize('delete',$book);
        $result = $action->delete($book);
        if ($result) {
            return response()->json(['message' => 'successfull'], 200);
        } else {
            return response()->json(['message' => 'fail']);
        }
    }

}
