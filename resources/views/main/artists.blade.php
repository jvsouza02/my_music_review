@extends('layouts.main-layout')

@section('tittle', 'Artists')

@section('content')
    <h2>Artists</h2>
    @if($artists->count() > 0)
        <ul>
            @foreach($artists as $artist)
                <li>
                    <a href="{{route('artist', ['id' => $artist->id])}}">
                        {{$artist->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No artists found</p>
    @endif
@endsection
