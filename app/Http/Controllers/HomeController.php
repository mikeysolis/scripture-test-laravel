<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BookController;

class HomeController extends Controller
{

    public function getInitialBooks()
    {
        $books = (new BookController)->booksByVolumeId(2);

        return inertia('Home', ['books' => $books]);
    }
}
