@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <h5>Sub menu {{ $parentPage->name }}</h5>
      <a href="{{ route('parent-pages.child-pages.create', $parentPage) }}" class="btn btn-primary btn-sm">Tambah sub menu</a>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Table sub menu</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Nama</th>
            <th class="text-white">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($childPages as $childPage)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $childPage->name }}</td>
            <td>
              <a href="{{ route('parent-pages.child-pages.edit', $childPage->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('parent-pages.child-pages.destroy', $childPage->id) }}" method="POST" style="display:inline-block;">
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