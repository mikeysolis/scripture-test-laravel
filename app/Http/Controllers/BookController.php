<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display the Book resource by volumeId.
     *
     * @param  $id
     * @return App\Http\Resources\BookResource
     */
    public function booksByVolumeId($id)
    {
        return BookResource::collection(Book::query()
                ->where('volume_id', '=', $id)
                ->get());
    }
}
