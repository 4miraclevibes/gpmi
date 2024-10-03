@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">Edit Halaman Nesting</h5>
    <div class="card-body">
      <form action="{{ route('nesting-pages.update', $nestingPage->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
          <label for="name" class="form-label">Nama Halaman Nesting</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $nestingPage->name }}" required>
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Isi Halaman Nesting</label>
          <textarea class="form-control" id="editor" name="body">{{ $nestingPage->body }}</textarea>
        </div>
        <div class="mb-3">
          <label for="background_image" class="form-label">URL Gambar Latar Belakang</label>
          <input type="url" class="form-control" id="background_image" name="background_image" value="{{ $nestingPage->background_image }}">
        </div>
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select class="form-control" id="status" name="status" required>
            <option value="active" {{ $nestingPage->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $nestingPage->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('nesting-pages.index') }}" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
