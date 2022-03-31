<?php

namespace App\Http\Controllers;

use App\Http\Resources\VerseResource;
use App\Http\Resources\VersesResource;
use App\Models\Verse;

class VerseController extends Controller
{
    /**
     * Display a listing of verses by chapterId.
     *
     * @param  $id
     * @return App\Http\Resources\VersesResource
     */
    public function versesByChapterId($id)
    {
        return VersesResource::collection(Verse::query()
                ->where('chapter_id', '=', $id)
                ->get());
    }

    /**
     * Display a single verse.
     *
     * @param  $id
     * @return App\Http\Resources\VerseResource
     */
    public function verseById($id)
    {
        return new VerseResource(Verse::findOrFail($id));
    }
}
