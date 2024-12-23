<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Album;

class Artist extends Model
{
    protected $fillable = ['name', 'description', 'image', 'albums_count', 'youtube_url', 'instagram_url'];

    public function albums() {
        return $this->hasMany(Album::class);
    }
}
