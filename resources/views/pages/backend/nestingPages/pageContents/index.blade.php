@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <h5>Buat {{ $nestingPage->name }}</h5>
      <a href="{{ route('nesting-page.page-contents.create', $nestingPage) }}" class="btn btn-primary btn-sm">Tambah</a>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Tabel Konten Halaman</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Nama</th>
            <th class="text-white">Status</th>
            <th class="text-white">Penulis</th>
            <th class="text-white">Admin</th>
            <th class="text-white">Tanggal Dibuat</th>
            <th class="text-white">Gambar</th>
            <th class="text-white">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pageContents as $pageContent)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $pageContent->name }}</td>
            <td>{{ $pageContent->status }}</td>
            <td>{{ $pageContent->author }}</td>
            <td>{{ $pageContent->user->name }}</td>
            <td>{{ $pageContent->created_at->format('d-m-Y') }}</td>
            <td><a href="{{ asset(Storage::url($pageContent->background_image)) }}" target="_blank" class="btn btn-primary btn-sm">Lihat</a></td>
            <td>
              <a href="{{ route('nesting-page.page-contents.edit', $pageContent->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('nesting-page.page-contents.destroy', $pageContent->id) }}" method="POST" style="display:inline-block;">
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
<!-- / Content -->
@endsection