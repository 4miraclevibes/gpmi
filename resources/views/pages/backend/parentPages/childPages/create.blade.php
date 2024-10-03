@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Buat Halaman Anak Baru <span class="text-muted">({{ $parentPage->name }})</span></h5>
        <div class="card-body">
            <form action="{{ route('parent-pages.child-pages.store', $parentPage) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Halaman</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Isi Halaman</label>
                    <textarea class="form-control" id="editor" name="body"></textarea>
                </div>
                <div class="mb-3">
                    <label for="background_image" class="form-label">URL Gambar Latar Belakang</label>
                    <input type="url" class="form-control" id="background_image" name="background_image" placeholder="https://example.com/image.jpg">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('parent-pages.child-pages.index', $parentPage) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection