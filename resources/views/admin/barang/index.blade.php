@extends('layouts.admin')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Barang</h1>
  </div>

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
      <h4>Daftar Barang</h4>
      <div class="card-header-action">
        <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped mb-0">
          <thead>
            <tr>
              <th>No</th><th>Nama</th><th>Kategori</th>
              <th>Harga Eceran</th><th>Harga Grosir</th><th>Stok</th><th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($barangs as $b)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $b->nama }}</td>
                <td>{{ $b->kategori }}</td>
                <td>Rp {{ number_format($b->harga_eceran, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($b->harga_grosir, 0, ',', '.') }}</td>
                <td>{{ $b->stok }}</td>
                <td>
                  <a href="{{ route('barang.edit', $b) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('barang.destroy', $b) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Hapus barang ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr><td colspan="7" class="text-center">Belum ada data barang.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection