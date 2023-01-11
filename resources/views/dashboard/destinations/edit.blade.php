@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Destinations</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/dashboard/destinations/{{ $destinations->slug }}" class="mb-5" enctype="multipart/form-data">
            @method("put")
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error("title") is-invalid @enderror" id="title" name="title" value="{{ old("title", $destinations->title) }}" required autofocus>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error("slug") is-invalid @enderror" id="slug" name="slug" value="{{ old("slug", $destinations->slug) }}" required>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                    @if( old("category_id", $destinations->category_id) == $category->id )
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control @error("price") is-invalid @enderror" id="price" name="price" value="{{ old("price", $destinations->price) }}" required>
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Destinations Image</label>
                {{-- gambar lama kalau ada --}}
                <input type="hidden" name="oldImage" value="{{ $destinations->image }}">
                {{-- kemudian ini dicek apakah ada image dari database kalau ada maka tampilkan yang dari database kalau tidak ada maka kita dapat upload image baru --}}
                @if ($destinations->image)
                    <img src="{{ asset("storage/".$destinations->image) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    {{-- jadi disini kita buat class untuk menampilkan file preview image --}}
                    <img class="img-preview img-fluid mb-3 col-sm-5" >
                @endif
                {{-- kemudian kita akan buat function javascript previewImage</preview> --}}
                <input class="form-control @error("image") is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error("image")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div> 
                @enderror
            </div> 
            <div class="col-lg-12 mb-3">
                <label for="body" class="form-label">Body</label>
                {{-- karena ini menggunakan trix editor, maka untuk display eror yang biasa di tulis di dalam class maka kita dapat tulis seperti ini saja --}}
                @error('body')
                    <div class="invalid-feedback">
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old("body", $destinations->body) }}" required>
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Update Destinations</button>
        </form>
    </div>
    <script> 
        //ini untuk mengambil input title dan slug berdasarkan id
        // const title = document.querySelector('#title');

        // //ini untuk mengambil input slug 
        // const slug = document.querySelector('#slug');

        // //change disini adalah ketika kita telah menginput title dan berpindah ke input slug
        // title.addEventListener("change", function() {
        //     //kemudian disini kita mengambil isi titlenya
        //     let preslug = title.value;
        //     //lalu disini kita menggunakan method replace yang seperti explode dalam php dan disini kita ganti spasi "/ /" dengan "-" dan g disini adalah replace tersebut dapat dilakukan lebih dari satu kali
        //     preslug = preslug.replace(/ /g,"-");
        //     //kemudian disini kita dapat lowercase semua tulisannya
        //     slug.value = preslug.toLowerCase();
        // });

        //nama function ini disamakan dengan nama function yang dituliskan di onchange
        function previewImage()
        {
            //mengambil input img dan untuk tampilannya previewnya
            const image = document.querySelector("#image");
            const imgPreview = document.querySelector(".img-preview");

            //mengubah display image preview class jadi block
            imgPreview.style.display = "block";

            //untuk menload file image dan memasukkannya ke src image yang classnya image preview
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection