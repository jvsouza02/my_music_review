@extends('layouts.main-layout')

@section('tittle', 'Artists')

@section('content')
    <section class="artists">
        <div class="artists-search container p-2 border-b-2 mt-2 flex justify-between align-items-center">
            <form action="#" method="GET" class="flex-grow">
                @csrf
                <div class="input-group">
                    <input type="text" name="search" placeholder="Search for an artist">
                    <button type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            <div>
                <button class="add-artist-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Artist">
                    <i class="bi bi-plus-lg"></i>
                </button>
            </div>
        </div>
        <div class="modal fade" id="addArtistModal" tabindex="-1" aria-labelledby="addArtistModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header flex justify-content-center align-items-center">
                        <h5 class="modal-title text-2xl bold" id="addArtistModalLabel">Add Artist</h5>
                        <button type="button" class="btn-close position-absolute end-0 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('artists.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="mb-3">
                                <label for="youtube_url" class="form-label">YouTube URL</label>
                                <input type="url" class="form-control" id="youtube_url" name="youtube_url">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="add-artist-confirm">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="artists-content container flex justify-center align-items-center mt-5">
            @if ($artists->count() > 0)
                <ul>
                    @foreach ($artists as $artist)
                        <li class="artist">
                            <img src="{{ asset('storage/' . $artist->image) }}" class="w-72" alt="{{$artist->name}}">
                            <h3>{{$artist->name}}</h3>
                            <p>{{$artist->description}}</p>
                            <a href="{{$artist->youtube_url}}" class="text-decoration-underline" target="_blank">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-2xl">No artists found</p>
            @endif
        </div>
    </section>
@endsection
