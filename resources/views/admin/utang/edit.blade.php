@extends('layouts.admin')

@section('content')
<section class="section">
  <div class="section-header"><h1>Edit Utang</h1></div>
  <div class="card">
    <form action="{{ route('utang.update', $utang) }}" method="POST">
      @csrf @method('PUT')
      <div class="card-body">@include('admin.utang._form')</div>
      <div class="card-footer text-right">
        <a href="{{ route('utang.index') }}" class="btn btn-secondary">Batal</a>
        <button class="btn btn-primary">Perbarui</button>
      </div>
    </form>
  </div>
</section>
@endsection
