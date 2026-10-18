@extends('layouts.admin')

@section('content')
<section class="section">
  <div class="section-header"><h1>Data Pelanggan</h1></div>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert"><span>&times;</span></button>
        {{ session('success') }}
      </div>
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert"><span>&times;</span></button>
        {{ session('error') }}
      </div>
    </div>
  @endif

  <div class="card">
    <div class="card-header">
      <h4>Daftar Pelanggan</h4>
      <div class="card-header-action">
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped mb-0">
          <thead>
            <tr><th>No</th><th>Nama</th><th>No HP</th><th>Alamat</th><th>Aksi</th></tr>
          </thead>
          <tbody>
            @forelse ($pelanggans as $p)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->no_hp }}</td>
                <td>{{ $p->alamat }}</td>
                <td>
                  <a href="{{ route('pelanggan.edit', $p) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('pelanggan.destroy', $p) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Hapus pelanggan ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr><td colspan="5" class="text-center">Belum ada data pelanggan.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection