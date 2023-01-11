@extends('layouts.main')
@section('content')
    <section class="banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h1 class="header">
                                Explore Beautiful
                                <span class="text-blue">
                                    <br> Places
                                </span> 
                            </h1>
                            <p class="support">
                                We are travel agency giving you
                                <br>marvelous experience. 
                                So, get your ticker 
                                <br>with low price to your favorite
                                <br>destinations.
                            </p>
                            <div class="btn-get-started">
                                <div class="row">
                                    <a href="" class="text-white">
                                        Get Started
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 text-center">
                            <a href="#">
                                <img src="{{ asset('img/banner.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="destinations">
        <div class="px-4 py-4 my-4 text-center">
            <h1 class="display-5 fw-medium">Top Destinations</h1>
            <div class="container mx-auto">
                <p class="lead mb-4">The best destinations in the whole 
                    <br> world are ready for you
                </p>
                <div class="destination">
                    @foreach ($destinations as $destination)
                        <div class="col-lg-4 col-md-2 col-sm-1 card" style="width: 18rem;">
                            {{-- ini kondisi apabila ada image dari database kalau misalkan tidak ada maka akan diambil dari unsplash dan ini untuk tampilan destination cardnya --}}
                            @if ($destination->image)
                                <img src="{{ asset("storage/".$destination->image) }}" alt="..." class="card-img-top">
                            @else
                                <img src="https://source.unsplash.com/288x197?{{ $destination->category->name }}" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title" >{{ $destination->title }}</h5>
                                <p class="card-text">
                                    <div class="container card-text-first">
                                        <img src="{{ asset('img/stars.png') }}" alt="" class="card-img-stars">
                                        4.9K Reviews
                                        <br>
                                    </div>
                                    <div class="container card-text-first">
                                        <img src="{{ asset('img/Location.png') }}" alt="" class="card-img-location">
                                        <a href="/destinations?category={{ $destination->category->slug }}"class="link-destination">
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
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="travel-easily">
        <div class="px-2 py-4 my-4 text-center">
            <h1 class="display-5 fw-medium">Travel Easily</h1>
            <div class="col-lg-8 mx-auto">
                <p class="lead mb-1">We have service and trust for customers to always 
                    <br> be the best and be their choices 
                </p>
            </div>
        </div>
        <div class="container travel-easily">
            <div class="row mb-5">
                <div class="col-lg-4 col-12">
                    <div class="travel-easily-description">
                        <img src="{{ asset('img/Easy Tickets.png') }}" class="img-travel-easily" alt="">
                        <h3 class="title">
                            Easy to buy Tickets
                        </h3>
                        <p class="support">
                            Buy tickets with just <br> one click 
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="item-benefit">
                        <img src="{{ asset('img/Lots Of Categories.png') }}" class="img-travel-easily" alt="">
                        <h3 class="title">
                            Lots of Choices
                        </h3>
                        <p class="support">
                            We have a variety travels <br> that suits you 
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="item-benefit">
                        <img src="{{ asset('img/Celebration.png') }}" class="img-travel-easily" alt="">
                        <h3 class="title">
                            Celebration
                        </h3>
                        <p class="support">
                            We will celebrate your first tour <br> with soft drinks 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-4 col-12">
                    <div class="travel-easily-description">
                        <img src="{{ asset('img/Best Tour Guide.png') }}" class="img-travel-easily" alt="">
                        <h3 class="title">
                            Best Tour Guide
                        </h3>
                        <p class="support">
                            The tour guide will help you <br> in your destination
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="item-benefit">
                        <img src="{{ asset('img/Travel Safe.png') }}" class="img-travel-easily" alt="">
                        <h3 class="title">
                            Travel Safe
                        </h3>
                        <p class="support">
                            We have already been <br> vaccined 
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="item-benefit">
                        <img src="{{ asset('img/24 hour Support.png') }}" class="img-travel-easily" alt="">
                        <h3 class="title">
                            24/7 Support
                        </h3>
                        <p class="support">
                            We have commited to serve the <br> best with customers
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials">
        <div class="container px-4 py-5" id="featured-3">
            <h2 class="display-6 fw-medium">
                Our Customer Say <br> About Us
            </h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <div class="feature col">
                    <div class="header-testimonial">
                        <h3 class="fs-2">“Memorable Trip”</h3>
                        <p>I was not really into travel but after I tried 
                            <br> MJN Travel how to travel across nation & 
                            <br>world I start to fall in love with travel.</p>
                    </div>
                    <div class="customer-picture-and-name d-flex">
                        <img src="{{ asset('img/James Bone Testimonials.png') }}" alt="" class="testimonial-image">
                        <div class="customer">
                            <p class="customer-name">
                                James Bone 
                                <br>
                                <span class="customer-job">Influencer</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="feature col">
                    <div class="header-testimonial">
                        <h3 class="fs-2">“Extraordinary Tour”</h3>
                        <p>I really work hard & smart to fulfill my 
                            <br>dream travel. MJN Travel really helped me 
                            <br>a lot to find my satisfy requirement
                        </p>
                    </div>
                    <div class="customer-picture-and-name d-flex">
                        <img src="{{ asset('img/Scarllet Johanson.png') }}" alt="" class="testimonial-image">
                        <div class="customer">
                            <p class="customer-name">
                                Scarllet Johanson 
                                <br>
                                <span class="customer-job">Business Woman</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="feature col">
                    <div class="header-testimonial">
                        <h3 class="fs-2">“Great Tour Guide”</h3>
                        <p>Travel is really important if we want to build 
                            <br>a higher self esteem and heal our self from 
                            <br>our daily activities and MJN is the answer</p>
                    </div>
                    <div class="customer-picture-and-name d-flex">
                        <img src="{{ asset('img/Chris Hemsworth.png') }}" alt="" class="testimonial-image">
                        <div class="customer">
                            <p class="customer-name">
                                Chris Hemsworth 
                                <br>
                                <span class="customer-job">Traveler</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection