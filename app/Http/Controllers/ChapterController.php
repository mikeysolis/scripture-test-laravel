<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChapterResource;
use App\Models\Chapter;

class ChapterController extends Controller
{
    /**
     * Display a listing of chapters.
     *
     * @param  $id
     * @return App\Http\Resources\ChapterResource
     */
    public function chaptersByBookId($id)
    {
        return ChapterResource::collection(Chapter::query()
                ->where('book_id', '=', $id)
                ->get());
    }
}
