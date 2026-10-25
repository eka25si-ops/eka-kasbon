@extends('layouts.admin')

@section('content')
<section class="section">
  <div class="section-header"><h1>Data Supplier</h1></div>

  @include('partials.alerts')

  <div class="card">
    <div class="card-header">
      <h4>Daftar Supplier</h4>
      <div class="card-header-action">
        <a href="{{ route('supplier.create') }}" class="btn btn-primary">Tambah Supplier</a>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped mb-0">
          <thead>
            <tr><th>No</th><th>Nama</th><th>No HP</th><th>Alamat</th><th>Aksi</th></tr>
          </thead>
          <tbody>
            @forelse ($suppliers as $s)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->no_hp }}</td>
                <td>{{ $s->alamat }}</td>
                <td>
                  <a href="{{ route('supplier.edit', $s) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('supplier.destroy', $s) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Hapus supplier ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr><td colspan="5" class="text-center">Belum ada data supplier.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
