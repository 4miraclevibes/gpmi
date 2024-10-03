@extends('layouts.backend.main')

@section('content')
<div class="container">
    <h1>Buat Halaman Baru </h1>
    <form action="{{ route('pages.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="name" class="form-label">Nama Halaman</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="body" class="form-label">Isi Halaman</label>
                <textarea type="text" class="form-control" id="editor" name="body"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="background_image" class="form-label">URL Gambar Latar Belakang</label>
                <input type="url" class="form-control" id="background_image" name="background_image" placeholder="https://example.com/image.jpg">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Buat Halaman</button>
        <a href="{{ route('pages.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection