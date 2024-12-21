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
}
