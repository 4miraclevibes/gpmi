@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createParentPageModal">
        Buat Halaman Induk
      </button>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Tabel Halaman Induk</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Nama</th>
            <th class="text-white">Pengguna</th>
            <th class="text-white">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($parentPages as $parentPage)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $parentPage->name }}</td>
            <td>{{ $parentPage->user->name }}</td>
            <td>
              <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editParentPageModal{{ $parentPage->id }}">
                Edit
              </button>
              <a href="{{ route('parent-pages.child-pages.index', $parentPage) }}" class="btn btn-info btn-sm">Anak</a>
              <form action="{{ route('parent-pages.destroy', $parentPage->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Buat Halaman Induk -->
<div class="modal fade" id="createParentPageModal" tabindex="-1" aria-labelledby="createParentPageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createParentPageModalLabel">Buat Halaman Induk Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('parent-pages.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Nama Halaman Induk</label>
            <input type="text" class="form-control" id="name" name="name" required>
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

<!-- Modal Edit Halaman Induk -->
@foreach ($parentPages as $parentPage)
<div class="modal fade" id="editParentPageModal{{ $parentPage->id }}" tabindex="-1" aria-labelledby="editParentPageModalLabel{{ $parentPage->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editParentPageModalLabel{{ $parentPage->id }}">Edit Halaman Induk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('parent-pages.update', $parentPage->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit_name{{ $parentPage->id }}" class="form-label">Nama Halaman Induk</label>
            <input type="text" class="form-control" id="edit_name{{ $parentPage->id }}" name="name" value="{{ $parentPage->name }}" required>
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

<!-- / Content -->
@endsection
