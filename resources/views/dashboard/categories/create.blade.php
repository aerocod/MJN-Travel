@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Categories</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/dashboard/categories" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ old("name") }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error("slug") is-invalid @enderror" id="slug" name="slug" value="{{ old("slug") }}" required>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Categories</button>
        </form>
    </div>
    <script>
        //ini untuk mengambil input title dan slug berdasarkan id
        const name = document.querySelector('#name');

        //ini untuk mengambil input slug 
        const slug = document.querySelector('#slug');

        //change disini adalah ketika kita telah menginput title dan berpindah ke input slug
        name.addEventListener("change", function() {
            //kemudian disini kita mengambil isi titlenya
            let preslug = name.value;
            //lalu disini kita menggunakan method replace yang seperti explode dalam php dan disini kita ganti spasi "/ /" dengan "-" dan g disini adalah replace tersebut dapat dilakukan lebih dari satu kali
            preslug = preslug.replace(/ /g,"-");
            //kemudian disini kita dapat lowercase semua tulisannya
            slug.value = preslug.toLowerCase();
        });
    </script>
@endsection