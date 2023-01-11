@extends('layouts.main')
@section('content')
    <section class="about-us-section">
        <div class="px-2 py-4 my-4 text-center">
            <h1 class="display-5 fw-medium">About us</h1>
            <div class="col-lg-8 mx-auto">
                <p class="lead about-us-description mb-1 mt-5">
                    MJN Travel is an independent travel consulting agency offering affordable travel packages with the backing of Club Travel South Africa. As a Club Travel South Africa affiliate, we have access to all pre-negotiated rates and fares to offer anyone wanting to see the world – see a wide selection of exciting travel solutions at the lowest prices, guaranteed.
                </p>
            </div>
        </div>
        <div class="container travel-easily">
            <h1 class="display-5 fw-medium title-founders">Founders</h1>
            <div class="row my-5">
                <div class="col-lg-3 col-12">
                    <div class="travel-easily-description">
                        <img src="{{ asset('img/Jerome Bell.png') }}" class="avatar-about-us" alt="">
                        <h3 class="title-about-us">
                            Jerome Bell
                        </h3>
                        <p class="support">
                            Marketing Coordinator 
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="travel-easily-description">
                        <img src="{{ asset('img/Dianne Russel.png') }}" class="avatar-about-us" alt="">
                        <h3 class="title-about-us">
                            Dianne Russel
                        </h3>
                        <p class="support">
                            Vice President 
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="item-benefit">
                        <img src="{{ asset('img/Ronald Richard.png ') }}" class="avatar-about-us" alt="">
                        <h3 class="title-about-us">
                            Ronald Richards
                        </h3>
                        <p class="support">
                            Web Designer 
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="item-benefit">
                        <img src="{{ asset('img/Esther Howard.png ') }}" class="avatar-about-us" alt="">
                        <h3 class="title-about-us">
                            Esther Howard
                        </h3>
                        <p class="support">
                            Procurement 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-3 col-12">
                    <div class="item-benefit">
                        <img src="{{ asset('img/Savannah Nyugen.png ') }}" class="avatar-about-us" alt="">
                        <h3 class="title-about-us">
                            Savannah Nyugen
                        </h3>
                        <p class="support">
                            Web Designer
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="item-benefit">
                        <img src="{{ asset('img/Marvel Mckiney.png ') }}" class="avatar-about-us" alt="">
                        <h3 class="title-about-us">
                            Marvin McKinney
                        </h3>
                        <p class="support">
                            Human Resource
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="item-benefit">
                        <img src="{{ asset('img/Eleanor Pena.png ') }}" class="avatar-about-us" alt="">
                        <h3 class="title-about-us">
                            Eleanor Pena
                        </h3>
                        <p class="support">
                            Partnership Support
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="item-benefit">
                        <img src="{{ asset('img/Floyd Miles.png ') }}" class="avatar-about-us" alt="">
                        <h3 class="title-about-us">
                            Floyd Miles
                        </h3>
                        <p class="support">
                            President Of Sales 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-3 col-12">
                    <div class="travel-easily-description">
                        <img src="{{ asset('img/Ralph Edwards.png ') }}" class="avatar-about-us" alt="">
                        <h3 class="title-about-us">
                            Ralph Edwards
                        </h3>
                        <p class="support">
                            Customer Relationship 
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="item-benefit">
                        <img src="{{ asset('img/Anna Kendrick.png ') }}" class="avatar-about-us" alt="">
                        <h3 class="title-about-us">
                            Anna Kendrick
                        </h3>
                        <p class="support">
                            Marketing Service
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="item-benefit">
                        <img src="{{ asset('img/Emelie Clark.png ') }}" class="avatar-about-us" alt="">
                        <h3 class="title-about-us">
                            Emelie Clark
                        </h3>
                        <p class="support">
                            Web Designer
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="item-benefit">
                        <img src="{{ asset('img/Darrel Steward.png ') }}" class="avatar-about-us" alt="">
                        <h3 class="title-about-us">
                            Darrel Steward
                        </h3>
                        <p class="support">
                            Head Of Tour Guide
                        </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <p class="lead about-us-description">
                        At MJN Travel we believe in building relationships based on trust, and therefore aim to create a customer experience that is second to none, which is founded on unwavering commitment to all travel requirements. 
                        <br>1. Why you should book with MJN Travel
                        <br>2. Honest, transparent, reliable, knowledgeable
                        <br>3. Club Travel Affiliate from Jan 2016
                        <br>4. 11+ Year’s experience behind our belt
                        <br>5. One Personal Travel Agent for Travel Bookings.
                        <br>6. Fantastic feedback from Clients, please read testimonials on our website
                        <br>7. Thousands off your Business, First-Class tickets, Cruises, Coach Tours.
                        <br>8. We assist with all accommodation, air, river, ocean and rail travel all around the world
                        <br>9. We take pride in arranging the best value for money holiday for you.
                        <br>10. Pay off your holiday offered with many destinations
                        <br>11. Available on WhatsApp while you are travelling
                        <br>12. Price Beat Guarantee
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection