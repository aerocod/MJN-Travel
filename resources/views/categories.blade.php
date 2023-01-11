@extends('layouts.main')
@section('content')
    <section class="Categories">
        <h1 class="mb-3 text-center">All Categories</h1>
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)      
                    <div class="col-lg-4">
                        <a href="/destinations?category={{ $category->slug }}">
                            <div class="card">
                                <img src="https://source.unsplash.com/414x275?{{ $category->name }}" class="card-img-categories" alt="">
                                <div class="card-img-overlay">
                                    <h5 class="card-title flex-fill title-card-categories">{{ $category->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection