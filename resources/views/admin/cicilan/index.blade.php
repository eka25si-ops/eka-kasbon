@extends('layouts.admin')

@section('content')
<section class="section">
  <div class="section-header"><h1>Data Cicilan</h1></div>

  @include('partials.alerts')

  <div class="card">
    <div class="card-header">
      <h4>Daftar Cicilan</h4>
      <div class="card-header-action">
        <form method="GET" action="{{ route('cicilan.index') }}" class="d-inline-flex mr-2">
          <input type="text" name="q" value="{{ $q }}" class="form-control mr-2" placeholder="Cari pelanggan / keterangan">
          <button class="btn btn-secondary">Cari</button>
        </form>
        <a href="{{ route('cicilan.create') }}" class="btn btn-primary">Tambah Cicilan</a>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped mb-0">
          <thead>
            <tr><th>No</th><th>Pelanggan</th><th>Utang</th><th>Tanggal Bayar</th><th>Jumlah Bayar</th><th>Catatan</th><th>Aksi</th></tr>
          </thead>
          <tbody>
            @forelse ($cicilans as $c)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->nama_pelanggan ?? '-' }}</td>
                <td>{{ $c->keterangan }}</td>
                <td>{{ \Carbon\Carbon::parse($c->tanggal_bayar)->format('d M Y') }}</td>
                <td>Rp {{ number_format($c->jumlah_bayar, 0, ',', '.') }}</td>
                <td>{{ $c->catatan ?? '-' }}</td>
             <td>@include('partials.action-buttons', ['route' => 'cicilan', 'model' => $c->id])</td>
              </tr>
            @empty
              <tr><td colspan="7" class="text-center">Belum ada data cicilan.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
