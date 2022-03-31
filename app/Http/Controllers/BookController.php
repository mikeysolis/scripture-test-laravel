<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allBooks()
    {
        return BookResource::collection(Book::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function bookById($id)
    {
        return new BookResource(Book::findOrFail($id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function booksByVolumeId($id)
    {
        return BookResource::collection(Book::query()
                ->where('volume_id', '=', $id)
                ->get());
    }
}
