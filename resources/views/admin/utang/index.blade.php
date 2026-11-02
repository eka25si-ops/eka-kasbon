@extends('layouts.admin')

@section('content')
<section class="section">
  <div class="section-header"><h1>Data Utang</h1></div>

  @include('partials.alerts')

  <div class="card">
    <div class="card-header">
      <h4>Daftar Utang Pelanggan</h4>
      <div class="card-header-action">
        <a href="{{ route('utang.create') }}" class="btn btn-primary">Tambah Utang</a>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped mb-0">
          <thead>
            <tr><th>No</th><th>Pelanggan</th><th>Keterangan</th><th>Jumlah</th><th>Jatuh Tempo</th><th>Status</th><th>Aksi</th></tr>
          </thead>
          <tbody>
            @forelse ($utangs as $u)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $u->pelanggan->nama ?? '-' }}</td>
                <td>{{ $u->keterangan }}</td>
                <td>Rp {{ number_format($u->jumlah, 0, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($u->jatuh_tempo)->format('d M Y') }}</td>
                <td>
                  <span class="badge {{ $u->status === 'lunas' ? 'badge-success' : 'badge-danger' }}">{{ $u->status }}</span>
                </td>
                <td>@include('partials.action-buttons', ['route' => 'utang', 'model' => $u])</td>
              </tr>
            @empty
              <tr><td colspan="7" class="text-center">Belum ada data utang.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
