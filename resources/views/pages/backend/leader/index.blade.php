@extends('layouts.backend.main')

@section('content')
<!-- Konten -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createLeaderModal">
        Tambah Pemimpin
      </button>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Daftar Pemimpin</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Judul</th>
            <th class="text-white">Nama</th>
            <th class="text-white">Gambar</th>
            <th class="text-white">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($leaders as $leader)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $leader->title }}</td>
            <td>{{ $leader->name }}</td>
            <td><img src="{{ asset('storage/' . $leader->image) }}" alt="{{ $leader->name }}" width="50"></td>
            <td>
              <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editLeaderModal{{ $leader->id }}">
                Edit
              </button>
              <form action="{{ route('leaders.destroy', $leader->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Tambah Pemimpin -->
<div class="modal fade" id="createLeaderModal" tabindex="-1" aria-labelledby="createLeaderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createLeaderModalLabel">Tambah Pemimpin Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('leaders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="image" name="image" required>
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

<!-- Modal Edit Pemimpin -->
@foreach ($leaders as $leader)
<div class="modal fade" id="editLeaderModal{{ $leader->id }}" tabindex="-1" aria-labelledby="editLeaderModalLabel{{ $leader->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLeaderModalLabel{{ $leader->id }}">Edit Pemimpin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('leaders.update', $leader->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit_title{{ $leader->id }}" class="form-label">Judul</label>
            <input type="text" class="form-control" id="edit_title{{ $leader->id }}" name="title" value="{{ $leader->title }}" required>
          </div>
          <div class="mb-3">
            <label for="edit_name{{ $leader->id }}" class="form-label">Nama</label>
            <input type="text" class="form-control" id="edit_name{{ $leader->id }}" name="name" value="{{ $leader->name }}" required>
          </div>
          <div class="mb-3">
            <label for="edit_image{{ $leader->id }}" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="edit_image{{ $leader->id }}" name="image">
            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

<!-- / Konten -->
@endsection
