@extends('layouts.main-layout')

@section('tittle', 'Albums')

@section('content')
    <section class="albums flex flex-col">
        <div class="container flex flex-row justify-between p-2 pb-3 border-b-2">
            <div class="flex flex-row col-8">
                <img src="{{asset('storage/'.$artist->image)}}" class="w-80 h-44 object-fit-fill rounded-lg" alt="">
                <div class="flex flex-col justify-between p-2">
                    <div>
                        <h1 class="font-bold text-3xl">{{$artist->name}}</h1>
                        <p>{{$artist->artist_rating}}</p>
                    </div>
                    <p>{{$artist->description}}</p>
                </div>
            </div>
        </div>
        <div class="container flex flex-col align-items-center mt-3">
            <div class="col-10 flex flex-row justify-between p-2">
                <h2 class="font-bold text-2xl">Albums</h2>
                <div class="flex gap-2">
                    <a href="" class="add-song-btn hover:bg-sky-700" data-bs-toggle="tooltip" data-bs-placement="top" title="Add a new song">
                        Song <i class="bi bi-plus-lg"></i>
                    </a>
                    <a href="" class="add-album-btn hover:bg-sky-700" data-bs-toggle="tooltip" data-bs-placement="top" title="Add a new album">
                        Album <i class="bi bi-plus-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
