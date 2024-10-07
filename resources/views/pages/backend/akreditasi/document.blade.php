@extends('layouts.backend.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Dokumen Program Studi: {{ $akreditasiStudyProgram->name }}</h4>

    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDocumentModal">
                Tambah Dokumen
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Sertifikat</th>
                            <th>Periode</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($akreditasiStudyProgram->studyProgramDocuments as $document)
                        <tr>
                            <td>{{ $document->category }}</td>
                            <td><a href="{{ Storage::url($document->sertificate) }}" target="_blank">Download</a></td>
                            <td>{{ $document->period }}</td>
                            <td>{{ $document->status }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editDocumentModal{{ $document->id }}">Edit</button>
                                <form action="{{ route('akreditasi-departments.study-programs.documents.destroy', $document->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Dokumen -->
<div class="modal fade" id="addDocumentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('akreditasi-departments.study-programs.documents.store', $akreditasiStudyProgram->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Internasional">Internasional</option>
                            <option value="Nasional">Nasional</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sertificate" class="form-label">Sertifikat</label>
                        <input type="file" class="form-control" id="sertificate" name="sertificate" required>
                    </div>
                    <div class="mb-3">
                        <label for="period" class="form-label">Periode</label>
                        <input type="text" class="form-control" id="period" name="period" required>
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

<!-- Modal Edit Dokumen -->
@foreach($akreditasiStudyProgram->studyProgramDocuments as $document)
<div class="modal fade" id="editDocumentModal{{ $document->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('akreditasi-departments.study-programs.documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="edit_name" name="name" value="{{ $document->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_category" class="form-label">Kategori</label>
                        <select class="form-select" id="edit_category" name="category" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Internasional" {{ $document->category == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                            <option value="Nasional" {{ $document->category == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_sertificate" class="form-label">Sertifikat</label>
                        <input type="file" class="form-control" id="edit_sertificate" name="sertificate" accept=".pdf">
                        @if($document->sertificate)
                            <small class="form-text text-muted">File saat ini: {{ Storage::url($document->sertificate) }}</small>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="period" class="form-label">Periode</label>
                        <input type="text" class="form-control" id="period" name="period" value="{{ $document->period }}" required>
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

@endsection