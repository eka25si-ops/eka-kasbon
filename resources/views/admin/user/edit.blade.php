@extends('layouts.admin')

@section('content')
<section class="section">
  <div class="section-header"><h1>Edit User</h1></div>
  <div class="card">
    <form action="{{ route('user.update', $user) }}" method="POST">
      @csrf @method('PUT')
      <div class="card-body">@include('admin.user._form')</div>
      <div class="card-footer text-right">
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
        <button class="btn btn-primary">Perbarui</button>
      </div>
    </form>
  </div>
</section>
@endsection
