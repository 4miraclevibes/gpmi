@extends('layouts.backend.main')

@section('content')
<div class="container">
    <h1>Edit Halaman Anak</h1>
    <form action="{{ route('parent-pages.child-pages.update', $childPage->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="name" class="form-label">Nama Halaman</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $childPage->name }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="body" class="form-label">Isi Halaman</label>
                <textarea class="form-control" id="editor" name="body">{!! $childPage->body !!}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="background_image" class="form-label">URL Gambar Latar Belakang</label>
                <input type="url" class="form-control" id="background_image" name="background_image" value="{{ $childPage->background_image }}" placeholder="https://example.com/image.jpg">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('parent-pages.child-pages.index', $childPage->parentPage) }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
