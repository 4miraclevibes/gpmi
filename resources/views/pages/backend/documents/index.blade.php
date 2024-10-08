@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createDocumentModal">
        Buat Dokumen
      </button>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Table Documents</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Name</th>
            <th class="text-white">User</th>
            <th class="text-white">Document</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($documents as $document)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $document->user->name }}</td>
            <td>{{ $document->name }}</td>
            <td><a href="{{ asset(Storage::url($document->file)) }}" target="_blank">Download</a> <button class="btn btn-primary btn-sm" onclick="copyToClipboard('{{ asset(Storage::url($document->file)) }}')">Copy</button></td>
            <td>
              <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Modal Buat Dokumen -->
<div class="modal fade" id="createDocumentModal" tabindex="-1" aria-labelledby="createDocumentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createDocumentModalLabel">Buat Dokumen Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Nama Dokumen</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="file" class="form-label">File Dokumen</label>
            <input type="file" class="form-control" id="file" name="file" required>
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
@section('scripts')
<script>
  function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
      alert('URL berhasil disalin ke clipboard');
    }).catch(function(err) {
      console.error('Gagal menyalin URL: ', err);
    });
  }
</script>
@endsection

