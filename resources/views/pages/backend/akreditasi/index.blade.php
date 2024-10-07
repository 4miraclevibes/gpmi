@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createDepartmentModal">
        Tambah Departemen
      </button>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Tabel Departemen</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Nama</th>
            <th class="text-white">Program Studi</th>
            <th class="text-white">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($departments as $department)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $department->name }}</td>
            <td>
              <ul>
                @foreach($department->akreditasiStudyPrograms as $studyProgram)
                  <li>
                    {{ $studyProgram->name }}
                    <a href="{{ route('akreditasi-departments.study-programs.documents.index', $studyProgram->id) }}" class="btn btn-info btn-sm mt-2">Dokumen</a>
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editStudyProgramModal{{ $studyProgram->id }}">
                      Edit
                    </button>
                    <form action="{{ route('akreditasi-departments.study-programs.destroy', $studyProgram->id) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus program studi ini?')">Hapus</button>
                    </form>
                  </li>
                @endforeach
              </ul>
            </td>
            <td>
              <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editDepartmentModal{{ $department->id }}">
                Edit
              </button>
              <form action="{{ route('akreditasi-departments.destroy', $department->id) }}" method="POST" style="display:inline-block;">
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

<!-- Modal Tambah Departemen -->
<div class="modal fade" id="createDepartmentModal" tabindex="-1" aria-labelledby="createDepartmentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createDepartmentModalLabel">Tambah Departemen Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('akreditasi-departments.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Nama Departemen</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <div id="study-programs">
              <div class="study-program-item mb-2">
                <input type="text" class="form-control mb-1" name="study_programs[0][name]" placeholder="Nama Program Studi" required>
              </div>
            </div>
            <button type="button" class="btn btn-secondary btn-sm mt-2 add-study-program" data-target="study-programs">Tambah Program Studi</button>
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

<!-- Modal Edit Departemen -->
@foreach ($departments as $department)
<div class="modal fade" id="editDepartmentModal{{ $department->id }}" tabindex="-1" aria-labelledby="editDepartmentModalLabel{{ $department->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDepartmentModalLabel{{ $department->id }}">Edit Departemen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('akreditasi-departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit_name{{ $department->id }}" class="form-label">Nama Departemen</label>
            <input type="text" class="form-control" id="edit_name{{ $department->id }}" name="name" value="{{ $department->name }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <ul>
              @foreach($department->akreditasiStudyPrograms as $studyProgram)
                <li>{{ $studyProgram->name }}</li>
              @endforeach
            </ul>
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

<!-- Modal Edit Program Studi -->
@foreach ($departments as $department)
  @foreach ($department->akreditasiStudyPrograms as $studyProgram)
    <div class="modal fade" id="editStudyProgramModal{{ $studyProgram->id }}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Program Studi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('akreditasi-departments.study-programs.update', $studyProgram->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
              <div class="mb-3">
                <label for="edit_study_program_name{{ $studyProgram->id }}" class="form-label">Nama Program Studi</label>
                <input type="text" class="form-control" id="edit_study_program_name{{ $studyProgram->id }}" name="name" value="{{ $studyProgram->name }}" required>
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
@endforeach
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let studyProgramCount = 0;

    function addStudyProgram(targetId) {
        studyProgramCount++;
        const studyProgramsDiv = document.getElementById(targetId);
        const newStudyProgram = document.createElement('div');
        newStudyProgram.className = 'study-program-item mb-2';
        newStudyProgram.innerHTML = `
            <input type="text" class="form-control mb-1" name="study_programs[${studyProgramCount}][name]" placeholder="Nama Program Studi" required>
            <button type="button" class="btn btn-danger btn-sm mt-1 remove-study-program">Hapus</button>
        `;
        studyProgramsDiv.appendChild(newStudyProgram);
    }

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('add-study-program')) {
            const targetId = e.target.getAttribute('data-target');
            addStudyProgram(targetId);
        }

        if (e.target && e.target.classList.contains('remove-study-program')) {
            e.target.closest('.study-program-item').remove();
        }
    });

    console.log('JavaScript loaded and running');
});
</script>
@endsection
