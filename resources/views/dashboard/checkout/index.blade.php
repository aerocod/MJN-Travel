@extends('dashboard.layouts.main')
@section('content')
@if (session()->has("Delete Transaction"))
    <div class="alert alert-success alert-dismissible fade show mt-3 col-lg-12" role="alert">
        {{ session("Delete Transaction") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Transactions</h1>
</div>
    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Date Of Booking</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Card Number</th>
                    <th scope="col">Expired</th>
                    <th scope="col">CVC</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checkouts as $checkout)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $checkout->user->name }}</td>
                        <td>{{ $checkout->destination->title }}</td>
                        <td>{{ $checkout->date_of_booking }}</td>
                        <td>{{ $checkout->quantity}}</td>
                        <td>{{ $checkout->price_per_person}}</td>
                        <td>{{ $checkout->total}}</td>
                        <td>{{ $checkout->card_number}}</td>
                        <td>{{ $checkout->expired}}</td>
                        <td>{{ $checkout->cvc}}</td>
                        <td>
                            {{-- jadi disini kita buat form dan actionnya akan pass data slugnya agar nanti bisa di ambil datanya di dashboard controller dan ini kita rewrite methodnya dyang dari category jadi delete, nah disini ingat form hanya bisa get dan category sehingga kita harus overwrite method didalam formnya dan disini langsung akan diarahkan ke function destroy di dashboard controller --}}
                            <form action="/dashboard/checkouts/{{ $checkout->id }}" method="post" class="d-inline">
                                @method("delete")
                                @csrf
                                <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection