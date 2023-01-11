@extends('dashboard.layouts.main')
@section('content')
    @if (session()->has("New Destination"))
    <div class="alert alert-success alert-dismissible fade show mt-3 col-lg-8" role="alert">
        {{ session("New Destination") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session()->has("Delete Destination"))
    <div class="alert alert-success alert-dismissible fade show mt-3 col-lg-8" role="alert">
        {{ session("Delete Destination") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session()->has("Update Destination"))
    <div class="alert alert-success alert-dismissible fade show mt-3 col-lg-8" role="alert">
        {{ session("Update Destination") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Destinations</h1>
    </div>
        <div class="table-responsive col-lg-8">
            <a href="/dashboard/destinations/create" class="btn btn-primary mb-3">Create New Destination</a>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($destinations as $destination)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $destination->title }}</td>
                            <td>{{ $destination->category->name }}</td>
                            <td>{{ $destination->price }}</td>
                            <td>
                                <a href="/dashboard/destinations/{{ $destination->slug }}" class="badge bg-info">
                                    <span data-feather="eye" ></span>
                                </a>
                                {{-- berikut arah urlnya yang kita tambahkan disini untuk mengakses method edit --}}
                                <a href="/dashboard/destinations/{{ $destination->slug }}/edit" class="badge bg-warning">
                                    <span data-feather="edit" ></span>
                                </a>
                                {{-- jadi disini kita buat form dan actionnya akan pass data slugnya agar nanti bisa di ambil datanya di dashboard controller dan ini kita rewrite methodnya dyang dari post jadi delete, nah disini ingat form hanya bisa get dan post sehingga kita harus overwrite method didalam formnya dan disini langsung akan diarahkan ke function destroy di dashboard controller --}}
                                <form action="/dashboard/destinations/{{ $destination->slug }}" method="post" class="d-inline">
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