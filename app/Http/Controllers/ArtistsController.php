<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistsController extends Controller
{
    public function index() {
        $artists = Artist::all();
        return view("main.artists", compact("artists"));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:40',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_url' => 'nullable|url',
            'instagram_url' => 'nullable|url'
        ]);

        $image_path = $request->file('image')->store('images', 'public');
        $artist = Artist::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'image'=> $image_path,
            'youtube_url'=> $request->youtube_url,
            'instagram_url'=> $request->instagram_url
        ]);

        return redirect()->back();
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:40',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_url' => 'nullable|url',
            'instagram_url' => 'nullable|url'
        ]);

        $artist = Artist::find($request->id);
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('images', 'public');
        } else {
            $image_path = $artist->image;
        }
        $artist->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'image'=> $image_path,
            'youtube_url'=> $request->youtube_url,
            'instagram_url'=> $request->instagram_url
        ]);

        return redirect()->back();
    }

    public function delete($id) {
        $artist = Artist::find($id);
        $artist->delete();
        return redirect()->back();
    }

    public function showArtist($id) {
        $artist = Artist::find($id);
        $albums = $artist->albums;
        return view("main.artist-profile", compact("artist", "albums"));
    }
}
