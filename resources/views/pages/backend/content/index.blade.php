@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editContentModal">
        Edit
      </button>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Content Beranda</h5>
    <div class="card-body">
      <h5 class="card-title">Tujuan</h5>
      <p class="card-text">{{ $content->tujuan }}</p>
      <h5 class="card-title">Sasaran</h5>
      <p class="card-text">{{ $content->sasaran }}</p>
      <h5 class="card-title">Tugas dan Fungsi</h5>
      <p class="card-text">{{ $content->tugas }}</p>
    </div>
    <div class="card-footer">
      <img src="{{ asset(Storage::url($content->tugas_image)) }}" alt="Tugas Image" class="img-fluid">
    </div>
  </div>
</div>
<!-- Modal Edit Content -->
<div class="modal fade" id="editContentModal" tabindex="-1" aria-labelledby="editContentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editContentModalLabel">Edit Content</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{ route('content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="tujuan" class="form-label">Tujuan</label>
            <textarea type="text" class="form-control" rows="4" id="tujuan" name="tujuan" required>{{ $content->tujuan }}</textarea>
          </div>
          <div class="mb-3">
            <label for="sasaran" class="form-label">Sasaran</label>
            <textarea type="text" class="form-control" rows="4" id="sasaran" name="sasaran" required>{{ $content->sasaran }}</textarea>
          </div>
          <div class="mb-3">
            <label for="tugas" class="form-label">Tugas</label>
            <textarea type="text" class="form-control" rows="4" id="tugas" name="tugas" required>{{ $content->tugas }}</textarea>
          </div>
          <div class="mb-3">
            <label for="tugas_image" class="form-label">Tugas Image</label>
            <input type="file" class="form-control" id="tugas_image" name="tugas_image">
            @if ($content->tugas_image)
              <a href="{{ asset(Storage::url($content->tugas_image)) }}" target="_blank" class="img-fluid mt-2">
                <img src="{{ asset(Storage::url($content->tugas_image)) }}" alt="Tugas Image" class="img-fluid mt-2">
              </a>
            @endif
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- / Content -->
@endsection
