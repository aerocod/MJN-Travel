@extends('layouts.register_and_login')
@section('content')
<section class="vh-100 sign-in-and-sign-up">
    <div class="mask d-flex align-items-center h-100    gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <div class="container image-align-sign-up">
                                <img src="{{ asset('img/Logo.png') }}" class="sign-in-and-sign-up-image" alt="">
                            </div>
                            <h2 class="text-uppercase text-center mb-5 fw-medium">Create an account</h2>
                            <form action="/register" method="POST">
                                @csrf
                                <div class="form-outline mb-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name " name="name" placeholder="name" autocomplete="off" value="{{ old("name") }}" autofocus required>
                                        <label for="name">Full Name</label>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="username" autocomplete="off" value="{{ old("username") }}" required>
                                        <label for="username" name="username">Username</label>
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="form-floating mb-3">
                                        <input type="email"class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" autocomplete="off" value="{{ old("email") }}" required>
                                        <label for="email" name="email">Email Address</label>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password" autocomplete="off" required>
                                        <label for="password" name="password">Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-check d-flex justify-content-start mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" autocomplete="off" required>
                                    <label class="form-check-label" for="form2Example3g">
                                        I agree all statements in 
                                        <a href="#" class="">
                                            Terms of service
                                        </a>
                                    </label>
                                </div>
                                <div class="d-flex justify-content-center btn-register">
                                    <button type="submit" class="btn text-white" style="border:none;">Register</button>
                                </div>
                                <div class="container">
                                    <p class="text-center text-muted mt-2 mb-0">Already have an account? 
                                        <a href="/login" class="">
                                            Login Here
                                        </a>
                                    </p>
                                </div>
                                <input type="hidden" name="is_admin" value="0">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection