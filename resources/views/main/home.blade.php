@extends('layouts.main-layout')

@section('tittle', 'MyMusicReview')

@section('content')
    <section class="start relative">
        <img class="flex z-0 cover w-100 h-100" src="{{ asset('img/banner.jpg') }}" alt="website banner">
        <div class="absolute top-0 flex flex-column z-100 mt-5 align-items-center">
            <h2 class="text-4xl">Your favorite music review website!</h2>
            <p>Make and see reviews of your favorite songs with just a few clicks</p>
            <a class="start-reviews-btn" href="#">Reviews here</a>
        </div>
    </section>
    <section class="reviews flex flex-column align-items-center">
        <h2 class="text-3xl mt-2">Latest Reviews</h2>
        <div class="flex justify-center gap-4 mt-5">
            <div class="review">
                <h3>Review 1</h3>
                <p>Review content</p>
            </div>
            <div class="review">
                <h3>Review 2</h3>
                <p>Review content</p>
            </div>
            <div class="review">
                <h3>Review 3</h3>
                <p>Review content</p>
            </div>
        </div>
    </section>
    <section class="about">@include('main.about')</section>
@endsection
