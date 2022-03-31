<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verse extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [
        'id',
        'chapter_id',
        'verse_number',
        'scripture_text',
    ];
}
