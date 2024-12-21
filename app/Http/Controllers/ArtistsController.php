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
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_url' => 'nullable|url'
        ]);

        $image_path = $request->file('image')->store('images', 'public');
        $artist = Artist::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'image'=> $image_path,
            'youtube_url'=> $request->youtube_url,
        ]);

        return redirect()->back();
    }
}
