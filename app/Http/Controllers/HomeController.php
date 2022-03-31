<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BookController;

class HomeController extends Controller
{
    // Return a list of books from the New Testament
    // as a React prop to the Home component
    public function getInitialBooks()
    {
        $books = (new BookController)->booksByVolumeId(2);

        return inertia('Home', ['books' => $books]);
    }
}
