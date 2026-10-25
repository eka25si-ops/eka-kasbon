@extends('layouts.admin')

@section('content')
<section class="section">
  <div class="section-header"><h1>Data Barang</h1></div>

  @include('partials.alerts')

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
                  @include('partials.action-buttons', ['route' => 'barang', 'model' => $b])
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
