<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Artist;

class Album extends Model
{
    protected $fillable = ['name', 'year', 'cover', 'artist_id', 'songs_count', 'playlist_url'];

    public function artist(){
        return $this->belongsTo(Artist::class);
    }
}
