@extends('dashboard.layouts.main')
@section('content')
    @if (session()->has("New Categories"))
    <div class="alert alert-success alert-dismissible fade show mt-3 col-lg-6" role="alert">
        {{ session("New Categories") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session()->has("Delete Categories"))
    <div class="alert alert-success alert-dismissible fade show mt-3 col-lg-6" role="alert">
        {{ session("Delete Categories") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session()->has("Update Categories"))
    <div class="alert alert-success alert-dismissible fade show mt-3 col-lg-6" role="alert">
        {{ session("Update Categories") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Destination Categories</h1>
</div>
    <div class="table-responsive col-lg-6">
        <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create New Category</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            {{-- berikut arah urlnya yang kita tambahkan disini untuk mengakses method edit --}}
                            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning">
                                <span data-feather="edit" ></span>
                            </a>
                            {{-- jadi disini kita buat form dan actionnya akan pass data slugnya agar nanti bisa di ambil datanya di dashboard controller dan ini kita rewrite methodnya dyang dari category jadi delete, nah disini ingat form hanya bisa get dan category sehingga kita harus overwrite method didalam formnya dan disini langsung akan diarahkan ke function destroy di dashboard controller --}}
                            <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
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