<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [
        'id',
        'volume_title',
        'volume_long_title',
        'volume_subtitle',
        'volume_short_title',
        'volume_lds_url',
    ];
}
