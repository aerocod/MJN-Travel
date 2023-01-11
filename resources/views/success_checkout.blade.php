@extends('layouts.main')
@section('content')
    <section class="checkout">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 col-12">
                    <img src="{{ asset('img/Success-Chekout.png') }}" height="200" class="mb-5" alt=" ">
                </div>
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <h2 class="primary-header ">
                        Thank You For Your Order
                    </h2>
                    <a href="/orders" class="btn btn-my-dashboard mt-3 p-10">
                        My Orders
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection