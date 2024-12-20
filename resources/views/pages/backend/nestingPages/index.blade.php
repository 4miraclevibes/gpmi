@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <a href="{{ route('nesting-page.create') }}" class="btn btn-primary btn-sm">
        Buat Menu Baru
      </a>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Tabel Menu</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Nama</th>
            <th class="text-white">Status</th>
            <th class="text-white">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($nestingPages as $nestingPage)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $nestingPage->name }}</td>
            <td>{{ $nestingPage->status }}</td>
            <td>
              <a href="{{ route('nesting-page.edit', $nestingPage->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <a href="{{ route('nesting-page.page-contents.index', $nestingPage) }}" class="btn btn-info btn-sm">+ {{ $nestingPage->name }}</a>
              <form action="{{ route('nesting-page.destroy', $nestingPage->id) }}" method="POST" style="display:inline-block;">
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