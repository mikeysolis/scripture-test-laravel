<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateScripturesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW \"scriptures\" AS CREATE VIEW scriptures AS SELECT volumes.id AS volume_id, books.id AS book_id, chapters.id AS chapter_id, verses.id AS verse_id, volume_title, book_title, volume_long_title, book_long_title, volume_subtitle, book_subtitle, volume_short_title, book_short_title, volume_lds_url, book_lds_url, chapter_number, verse_number, scripture_text, book_title || ' ' || chapter_number || ':' || verse_number AS verse_title, book_short_title || ' ' || chapter_number || ':' || verse_number AS verse_short_title FROM volumes INNER JOIN books ON books.volume_id = volumes.id INNER JOIN chapters ON chapters.book_id = books.id INNER JOIN verses ON verses.chapter_id = chapters.id ORDER BY volumes.id, books.id, chapters.id, verses.id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS \"scriptures\"");
    }
}
