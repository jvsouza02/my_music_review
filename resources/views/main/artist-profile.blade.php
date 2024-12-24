@extends('layouts.main-layout')

@section('tittle', 'Albums')

@section('content')
    <section class="albums flex flex-col">
        <div class="artist-info container flex flex-row justify-between pb-2.5 bg-slate-300">
            <div class="flex flex-row col-8">
                <img src="{{ asset('storage/' . $artist->image) }}" class="w-80 h-44 object-fit-fill rounded-b-lg"
                    alt="">
                <div class="flex flex-col justify-between p-2">
                    <div>
                        <h1 class="font-bold text-3xl">{{ $artist->name }}</h1>
                        <p>{{ $artist->artist_rating }}</p>
                    </div>
                    <p>{{ $artist->description }}</p>
                </div>
            </div>
        </div>
        <div class="container flex flex-col align-items-center mt-3">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            <div class="col-10 flex flex-row justify-between p-2">
                <h2 class="font-bold text-2xl">Albums</h2>
                <div class="flex gap-2">
                    <a href="" class="add-song-btn hover:bg-sky-700" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Add a new song">
                        Song <i class="bi bi-plus-lg"></i>
                    </a>
                    <!-- Modal Trigger -->
                    <a href="#" class="add-album-btn hover:bg-sky-700" data-bs-toggle="modal"
                        data-bs-target="#addAlbumModal" title="Add a new album">
                        Album <i class="bi bi-plus-lg"></i>
                    </a>
                    <!-- Modal Structure -->
                    <div class="modal fade" id="addAlbumModal" tabindex="-1" aria-labelledby="addAlbumModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center align-items-center">
                                    <h5 class="modal-title text-2xl font-bold" id="addAlbumModalLabel">Add New Album</h5>
                                    <button type="button" class="btn-close position-absolute end-0 me-2"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="albumName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="albumName" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="albumYear" class="form-label">Year</label>
                                            <input type="number" class="form-control" id="albumYear" name="year"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="albumCover" class="form-label">Cover</label>
                                            <input type="file" class="form-control" id="albumCover" name="cover"
                                                required>
                                        </div>
                                        <input type="text" name="artist_id" value="{{ $artist->id }}" hidden>
                                        <div class="mb-3">
                                            <label for="playlistUrl" class="form-label">Playlist URL</label>
                                            <input type="url" class="form-control" id="playlistUrl" name="playlist_url"
                                                required>
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="submit" class="add-album-btn">Confirm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 flex flex-col gap-4">
                @if ($albums->count() > 0)
                    @foreach ($albums as $album)
                        <a href="">
                            <div
                                class="flex flex-row items-center p-2 border-b-2 hover:bg-gray-200 cursor-pointer rounded-lg">
                                <img src="{{ asset('storage/' . $album->cover) }}" class="w-20 h-20 object-cover rounded-lg"
                                    alt="">
                                <div class="flex flex-row justify-between w-full">
                                    <div class="flex flex-col justify-center ml-4">
                                        <h3 class="font-bold text-md">{{ $album->name }}</h3>
                                        <p>{{ $album->year }}</p>
                                    </div>
                                    <div class="flex flex-row gap-2 justify-center align-items-center">
                                        <a href="{{ $album->playlist_url }}" target="_blank" title="View on YouTube">
                                            <i class="bi bi-youtube text-red-600"></i>
                                        </a>
                                        <button href="#" data-bs-toggle="modal"
                                            data-bs-target="#editAlbumModal{{ $album->id }}" title="Edit Album">
                                            <i class="bi bi-pencil-square text-blue-600"></i>
                                        </button>
                                        <!-- Edit Album Modal -->
                                        <div class="modal fade" id="editAlbumModal{{ $album->id }}" tabindex="-1"
                                            aria-labelledby="editAlbumModalLabel{{ $album->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header justify-content-center align-items-center">
                                                        <h5 class="modal-title text-2xl font-bold"
                                                            id="editAlbumModalLabel{{ $album->id }}">Edit Album</h5>
                                                        <button type="button"
                                                            class="btn-close position-absolute end-0 me-2"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('albums.update', $album->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="albumName{{ $album->id }}"
                                                                    class="form-label">Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="albumName{{ $album->id }}" name="name"
                                                                    value="{{ $album->name }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="albumYear{{ $album->id }}"
                                                                    class="form-label">Year</label>
                                                                <input type="number" class="form-control"
                                                                    id="albumYear{{ $album->id }}" name="year"
                                                                    value="{{ $album->year }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="albumCover{{ $album->id }}"
                                                                    class="form-label">Cover</label>
                                                                <input type="file" class="form-control"
                                                                    id="albumCover{{ $album->id }}" name="cover">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="playlistUrl{{ $album->id }}"
                                                                    class="form-label">Playlist URL</label>
                                                                <input type="url" class="form-control"
                                                                    id="playlistUrl{{ $album->id }}"
                                                                    name="playlist_url"
                                                                    value="{{ $album->playlist_url }}" required>
                                                            </div>
                                                            <div class="flex justify-end">
                                                                <button type="submit"
                                                                    class="edit-album-confirm">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('albums.delete', $album->id) }}" title="Delete Album">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <p class="mx-2">No albums found</p>
                @endif
            </div>
        </div>
    </section>
@endsection
