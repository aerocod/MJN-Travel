@extends('layouts.main')
@section('content')
    <section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <h2 class="primary-header ">
                        My Orders
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                <table class="table">
                    <tbody>
                        @forelse ($checkouts as $checkout)
                            <tr class="align-middle">
                                <td width="18%">
                                    @if ($checkout->destination->image)
                                        <img src="{{ asset("storage/".$checkout->destination->image) }}" style="border-radius:20px" alt="..." width="200" height="120">
                                    @else
                                        <img src="https://source.unsplash.com/414x275?{{ $checkout->destination->category->name }}" style="border-radius:20px" width="200" height="120" alt="">
                                    @endif
                                </td>
                                <td>
                                    <p class="mb-2">
                                        <strong>{{$checkout->destination->title}}</strong>
                                    </p>
                                    <p>
                                        {{$checkout->date_of_booking}}
                                    </p>
                                </td>
                                <td>
                                    <div class="container" style="text-align: center">
                                        <strong>
                                            ${{$checkout->total}}
                                        </strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="container" style="padding-right: 15%; text-align: right">
                                        <a href="https://wa.me/087872611668?text=Hi, saya ingin bertanya mengenai {{$checkout->destination->title}} Tour" class="btn btn-primary" target="blank">
                                            Contact Support
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    No Orders
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection