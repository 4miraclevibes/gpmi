@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Edit Konten <span class="text-success">{{ $pageContent->nestingPage->name }}</span> <span class="text-primary">{{ $pageContent->name }}</span></h5>
        <div class="card-body">
            <form action="{{ route('nesting-page.page-contents.update', $pageContent->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Konten</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $pageContent->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Isi Konten</label>
                    <textarea class="form-control" id="editor" name="body">{{ $pageContent->body }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="background_image" class="form-label">Gambar Latar Belakang</label>
                    <input type="file" class="form-control" id="background_image" name="background_image">
                    <a href="{{ asset(Storage::url($pageContent->background_image)) }}" target="_blank" class="btn btn-primary btn-sm mx-2">Lihat</a>
                </div>
                <div class="mb-3">
                    <label for="created_at" class="form-label">Tanggal Dibuat</label>
                    <input type="date" class="form-control" id="created_at" name="created_at" value="{{ $pageContent->created_at->format('Y-m-d') }}">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="author" name="author" value="{{ $pageContent->author }}" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="publish" {{ $pageContent->status == 'publish' ? 'selected' : '' }}>Publish</option>
                        <option value="hidden" {{ $pageContent->status == 'hidden' ? 'selected' : '' }}>Hidden</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('nesting-page.page-contents.index', $pageContent->nestingPage) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
