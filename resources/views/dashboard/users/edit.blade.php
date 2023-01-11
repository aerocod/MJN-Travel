@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/dashboard/users/{{ $users->username }}" class="mb-5">
            @method("put")
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ old("name", $users->name) }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error("username") is-invalid @enderror" id="username" name="username" value="{{ old("username", $users->username) }}" required>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error("email") is-invalid @enderror" id="email" name="email" value="{{ old("email", $users->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_admin" class="form-label">Is Admin</label>
                <select class="form-select" name="is_admin">
                    @if( old("is_admin") == $users->is_admin )
                        <option value="{{ $users->is_admin }}" selected>{{ $users->is_admin }}</option>
                    @else
                        <option value="1">True</option>
                        <option value="0">False</option>
                    @endif
                </select>
            </div>
        <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
@endsection