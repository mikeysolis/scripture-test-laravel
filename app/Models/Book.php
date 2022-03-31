<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [
        'id',
        'volume_id',
        'book_title',
        'book_long_title',
        'book_subtitle',
        'book_short_title',
        'book_lds_url',
    ];
}
