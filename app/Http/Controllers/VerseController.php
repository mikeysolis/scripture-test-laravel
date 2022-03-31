<?php

namespace App\Http\Controllers;

use App\Http\Resources\VerseResource;
use App\Http\Resources\VersesResource;
use App\Models\Verse;

class VerseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function versesByChapterId($id)
    {
        return VersesResource::collection(Verse::query()
                ->where('chapter_id', '=', $id)
                ->get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verseById($id)
    {
        return new VerseResource(Verse::findOrFail($id));
    }
}
