<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:2022',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'artist_id' => 'required|integer|exists:artists,id',
            'playlist_url' => 'nullable|url'
        ]);

        $cover_path = $request->file('cover')->store('images', 'public');
        $album = Album::create([
            'name'=> $request->name,
            'year'=> $request->year,
            'cover'=> $cover_path,
            'artist_id'=> $request->artist_id,
            'playlist_url'=> $request->playlist_url
        ]);

        return redirect()->back();
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:2022',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'playlist_url' => 'nullable|url'
        ]);

        $album = Album::find($request->id);
        if ($request->hasFile('cover')) {
            $cover_path = $request->file('cover')->store('images', 'public');
        } else {
            $cover_path = $album->cover;
        }
        $album->update([
            'name'=> $request->name,
            'year'=> $request->year,
            'cover'=> $cover_path,
            'playlist_url'=> $request->playlist_url
        ]);

        return redirect()->back();
    }

    public function delete($id) {
        $album = Album::find($id);
        $album->delete();

        return redirect()->back();
    }
}
