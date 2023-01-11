@extends('layouts.register_and_login')
@section('content')
    <section class="vh-100 sign-in-and-sign-up">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            @if (session()->has("success"))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session("success") }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has("loginError"))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session("loginError") }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="row justify-content-center">
                                <img src="{{ asset('img/Logo.png') }}" class="sign-in-and-sign-up-image" alt="">
                                <p class="text-center h1 fw-medium mb-5 mx-1 m-auto">Sign In</p>
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <form action="/login" method="POST" class="mx-1 mx-md-4">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" name="email" placeholder="name@example.com" autofocus required>
                                                    <label for="email">Email address</label>
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <div class="form-floating">
                                                    <input type="password" class="form-control @error("password") is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                                                    <label for="password">Password</label>
                                                    @error('password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-4">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required/>
                                            <label class="form-check-label" for="form2Example3">
                                            I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                        </div>
                                        <div class="d-flex justify-content-start btn-sign-in">
                                            <button type="submit" class="btn text-white m-auto" style="border:none;">Sign In</button>
                                        </div>
                                        <div class="container small-login-and-register my-2" style="font-size: 15px;">
                                            Don't have an acoount? 
                                            <a href="/register">Register Here!</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="{{ asset('img/sign-in-img.png') }}" class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection