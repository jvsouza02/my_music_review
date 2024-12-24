@extends('layouts.main-layout')

@section('tittle', 'Artists')

@section('content')
    <section class="artists h-100">
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
                        <h5 class="modal-title text-2xl font-bold" id="addArtistModalLabel">Add Artist</h5>
                        <button type="button" class="btn-close position-absolute end-0 me-2" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('artists.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="2" minlength="40"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" >
                            </div>
                            <div class="mb-3">
                                <label for="youtube_url" class="form-label">YouTube URL</label>
                                <input type="url" class="form-control" id="youtube_url" name="youtube_url">
                            </div>
                            <div class="mb-3">
                                <label for="instagram_url" class="form-label">Instagram URL</label>
                                <input type="url" class="form-control" id="instagram_url" name="instagram_url">
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="add-artist-confirm">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="artists-content container flex justify-center align-items-center gap-5 mt-5 flex-wrap my-3">
            @if ($artists->count() > 0)
                    @foreach ($artists as $artist)
                        <div class="flex justify-center flex-wrap">
                            <div class="card w-80">
                                <a href="{{route('artists.profile', $artist->id)}}"><img src="{{ asset('storage/' . $artist->image) }}" class="card-img-top h-48"
                                    alt="{{ $artist->name }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Artist Page"></a>
                                <div class="card-body">
                                    <div class="flex flex-row justify-between align-items-center">
                                        <div class="card-name">
                                            <h5 class="font-bold text-lg"><a href="{{$artist->youtube_url}}" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Youtube Channel" target="_blank">{{$artist->name}}</a></h5>
                                        </div>
                                        <div>
                                            <a href="{{ $artist->instagram_url }}" class="instagram-artist-btn btn" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Instagram" target="_blank">
                                                <i class="bi bi-instagram"></i>
                                            </a>
                                            <button class="edit-artist-btn btn btn-info" data-bs-toggle="modal" data-bs-target="#editArtistModal{{ $artist->id }}" data-bs-placement="top" title="Edit Artist">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <a href="{{route('artists.delete', $artist->id)}}" class="delete-artist-btn btn btn-danger" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete Artist">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <p class="card-text mt-2 mb-2 text-md">{{ $artist->description }}</p>
                                    <a href="{{route('artists.profile', $artist->id)}}" class="text-decoration-underline">Albums: {{ $artist->albums_count }}</a>
                                    <p>Rate: {{ $artist->artist_rating }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editArtistModal{{ $artist->id }}" tabindex="-1" aria-labelledby="editArtistModalLabel{{ $artist->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header flex justify-content-center align-items-center">
                                        <h5 class="modal-title text-2xl bold" id="editArtistModalLabel{{ $artist->id }}">Edit Artist</h5>
                                        <button type="button" class="btn-close position-absolute end-0 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('artists.update', $artist->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name{{ $artist->id }}" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name{{ $artist->id }}" name="name" value="{{ $artist->name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="description{{ $artist->id }}" class="form-label">Description</label>
                                                <textarea class="form-control" id="description{{ $artist->id }}" name="description" rows="2" minlength="40">{{ $artist->description }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="image{{ $artist->id }}" class="form-label">Image</label>
                                                <input type="file" class="form-control" id="image{{ $artist->id }}" name="image" value="{{ $artist->image }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="youtube_url{{ $artist->id }}" class="form-label">YouTube URL</label>
                                                <input type="url" class="form-control" id="youtube_url{{ $artist->id }}" name="youtube_url" value="{{ $artist->youtube_url }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="instagram_url{{ $artist->id }}" class="form-label">Instagram URL</label>
                                                <input type="url" class="form-control" id="instagram_url{{ $artist->id }}" name="instagram_url" value="{{ $artist->instagram_url }}">
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="edit-artist-confirm">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            @else
                <p class="text-2xl">No artists found</p>
            @endif
        </div>
    </section>
@endsection
