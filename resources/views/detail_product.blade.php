@extends('layouts.main')
@section('content')
    <section class="detail-product-page">
        <h1 class="mb-3 text-center">{{ $destinations->title }}</h1>
        <div class="container detail-product-container">
            @if ($destinations->image)
                <img src="{{ asset("storage/".$destinations->image) }}" alt="..." class="mb-5 card-img-top img-detail-product">
            @else
                <img src="https://source.unsplash.com/837x551?{{ $destinations->category->name }}" class="mb-5 img-detail-product" alt=" ">
            @endif
        </div>
        <div class="container description-detail-product">
            <h3 class="title-description">Description : </h3>
            {!! $destinations->body !!}
            <div class="book-now-product">
                <div class="row price-detail-product">
                    ${{ $destinations->price }}/Person
                </div>
                <div class="btn-book-now-detail-product-page">
                    <a href="/checkout?destination={{ $destinations->slug }}" class="text-white">Buy Ticket</a>
                </div>
            </div>
        </div>
    </section>
@endsection