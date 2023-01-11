@extends('dashboard.layouts.main')
@section('content')
    @if (session()->has("New Users"))
    <div class="alert alert-success alert-dismissible fade show mt-3 col-lg-12" role="alert">
        {{ session("New Users") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session()->has("Delete Users"))
    <div class="alert alert-success alert-dismissible fade show mt-3 col-lg-12" role="alert">
        {{ session("Delete Users") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session()->has("Update Users"))
    <div class="alert alert-success alert-dismissible fade show mt-3 col-lg-12" role="alert">
        {{ session("Update Users") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
</div>
    <div class="table-responsive col-lg-12">
        <a href="/dashboard/users/create" class="btn btn-primary mb-3">Create New User</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Is_Admin</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->password}}</td>
                        <td>{{ $user->is_admin}}</td>
                        <td>
                            {{-- berikut arah urlnya yang kita tambahkan disini untuk mengakses method edit --}}
                            <a href="/dashboard/users/{{ $user->username }}/edit" class="badge bg-warning">
                                <span data-feather="edit" ></span>
                            </a>
                            {{-- jadi disini kita buat form dan actionnya akan pass data slugnya agar nanti bisa di ambil datanya di dashboard controller dan ini kita rewrite methodnya dyang dari user jadi delete, nah disini ingat form hanya bisa get dan user sehingga kita harus overwrite method didalam formnya dan disini langsung akan diarahkan ke function destroy di dashboard controller --}}
                            <form action="/dashboard/users/{{ $user->username }}" method="post" class="d-inline">
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