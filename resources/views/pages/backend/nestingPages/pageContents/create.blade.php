@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Buat Konten <span class="text-success">{{ $nestingPage->name }}</span></h5>
        <div class="card-body">
            <form action="{{ route('nesting-page.page-contents.store', $nestingPage) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Konten</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Isi Konten</label>
                    <textarea class="form-control" id="editor" name="body"></textarea>
                </div>
                <div class="mb-3">
                    <label for="background_image" class="form-label">URL Gambar Latar Belakang</label>
                    <input type="url" class="form-control" id="background_image" name="background_image">
                </div>
                <div class="mb-3">
                    <label for="created_at" class="form-label">Tanggal Dibuat</label>
                    <input type="date" class="form-control" id="created_at" name="created_at" value="{{ now()->format('Y-m-d') }}">
                  </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('nesting-page.page-contents.index', $nestingPage) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection