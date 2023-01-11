@extends('layouts.main')
@section('content')
    <section class="checkout m-5">
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <p>{{ $destination->title }}</p>
                    <h2>Checkout Form</h2>
                    <p class="lead">
                        Please fill the form below to complete your purchase
                    </p>
                </div>
                <div class="col-md-7 col-lg-6 m-auto">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" action="/checkout?destination={{ request("destination") }}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="name" class="form-label">Full name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ Auth::user()->name }}" name="name" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ Auth::user()->email }}" name="email" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="col-12">
                                <label for="date" class="form-label">Date of booking</label>
                                <input type="date" class="form-control @error('date_of_booking') is-invalid @enderror" id="date" name="date_of_booking" required>
                                @error('date_of_booking')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="quantity" class="form-label">How Many Tickets you want to purchase?</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="123..." name="quantity" required>
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="my-3">
                            <div class="form-check">
                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                                <label class="form-check-label" for="credit">Credit card</label>
                            </div>
                            <div class="form-check">
                                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                                <label class="form-check-label" for="debit">Debit card</label>
                            </div>
                        </div>

                        <div class="row gy-3">

                            <div class="col-md-12">
                                <label for="card_number" class="form-label">Credit card number</label>
                                <input type="string" class="form-control @error('card_number') is-invalid @enderror" id="card_number" name="card_number" maxlength="19" required>
                                @error('card_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="expired" class="form-label">Expired</label>
                                <input type="month" class="form-control @error('expired') is-invalid @enderror" id="expired" name="expired" required>
                                @error('expired')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="cvc" class="form-label">CVC</label>
                                <input type="string" class="form-control @error('cvc') is-invalid @enderror" id="cvc" name="cvc" maxlength="3" required>
                                @error('cvc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </main>    
        </div>
    </section>
@endsection