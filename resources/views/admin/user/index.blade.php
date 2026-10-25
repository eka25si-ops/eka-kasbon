@extends('layouts.admin')

@section('content')
<section class="section">
  <div class="section-header"><h1>Data User</h1></div>

  @include('partials.alerts')

  <div class="card">
    <div class="card-header">
      <h4>Daftar User</h4>
      <div class="card-header-action">
        <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped mb-0">
          <thead>
            <tr><th>No</th><th>Nama</th><th>Email</th><th>Aksi</th></tr>
          </thead>
          <tbody>
            @forelse ($users as $u)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>@include('partials.action-buttons', ['route' => 'user', 'model' => $u])</td>
              </tr>
            @empty
              <tr><td colspan="4" class="text-center">Belum ada data user.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
