@extends('layouts.main')
@section('content')
<section class="explore-destination">
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/destinations" method="GET">
                    @if(request("category"))
                        <input type="hidden" name="category" value="{{ request("category") }}">
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-search" placeholder="Search.." name="search" value="{{ request("search") }}">
                        <button class="btn btn-form" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-flex">
            @if($destinations->count())
                @foreach ($destinations as $destination)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            @if ($destination->image)
                                <img src="{{ asset("storage/".$destination->image) }}" alt="..." class="card-img-top">
                            @else
                                <img src="https://source.unsplash.com/414x275?{{ $destination->category->name }}" class="card-img-top" alt="">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $destination->title }}</h5>
                                <p class="card-text">
                                    <div class="container card-text-first">
                                        <img src="{{ asset('img/stars.png') }}" alt="" class="card-img-stars">
                                        4.9K Reviews
                                        <br>
                                    </div>
                                    <div class="container card-text-first">
                                        <img src="{{ asset('img/Location.png') }}" alt="" class="card-img-location">
                                        <a href="/destinations?category={{ $destination->category->slug }}" class="link-destination">
                                            {{ $destination->category->name }}
                                        </a>
                                        <br>
                                        <span class="price">
                                            ${{ $destination->price }}/Person
                                        </span>
                                    </div>
                                </p>
                                <div class="container btn-book-now">
                                    <a href="/destinations/{{ $destination->slug }}" class="text-white">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="no-destination fs-5">No Destinations found.</p>
            @endif
        </div>
    </div>
<div class="container">
    {{ $destinations->links() }}
</div>
</section>
@endsection