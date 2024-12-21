<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name', 'year', 'cover', 'artist_id', 'songs_count', 'playlist_url'];
}
