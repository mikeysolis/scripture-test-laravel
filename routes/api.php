<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\VerseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
// TODO: This was fun but I need to simplify for this project
// TODO: Only need to get chapters by bookId, verses by chapterId
// TODO: and verse by verseId

// Get all chapters in a book
Route::get('/chapters/{id}', [ChapterController::class, 'chaptersByBookId']);

// Get all verses in a chapter
Route::get('/verses/{id}', [VerseController::class, 'versesByChapterId']);

// Get a verse
Route::get('/verse/{id}', [VerseController::class, 'verseById']);
