@extends('layouts.admin')

@section('content')
<section class="section">
  <div class="section-header"><h1>Tambah User</h1></div>
  <div class="card">
    <form action="{{ route('user.store') }}" method="POST">
      @csrf
      <div class="card-body">@include('admin.user._form')</div>
      <div class="card-footer text-right">
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
        <button class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</section>
@endsection
