@extends('layouts.guest')

@section('content')
<style>
  .g-wrap { max-width: 1000px; margin: 0 auto; padding: 32px 20px; }
  .g-title { font-size: 24px; font-weight: 700; margin: 0 0 20px; color: #1f2937; }
  .g-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 16px; }
  .g-card { background: #fff; border-radius: 12px; padding: 18px; box-shadow: 0 2px 10px rgba(0,0,0,.08); }
  .g-card h5 { margin: 0 0 6px; font-size: 18px; font-weight: 700; }
  .g-card .amt { font-size: 20px; font-weight: 700; margin: 8px 0; }
  .g-card small { color: #6b7280; }
  .g-badge { display: inline-block; margin-top: 10px; padding: 4px 12px; border-radius: 999px; font-size: 12px; color: #fff; }
  .g-badge.lunas { background: #22c55e; }
  .g-badge.belum { background: #ef4444; }
  .g-list { list-style: none; margin: 0; padding: 0; background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,.08); }
  .g-list li { display: flex; justify-content: space-between; align-items: center; padding: 14px 18px; border-bottom: 1px solid #eee; }
  .g-list li:last-child { border-bottom: 0; }
  .g-list .sub { font-size: 13px; color: #6b7280; }
  .g-empty { color: #6b7280; }
</style>

<div class="g-wrap">
  <h2 class="g-title">Daftar Utang Pelanggan</h2>
  <div class="g-grid">
    @forelse ($utangs as $utang)
      @include('partials.guest-utang-card', ['utang' => $utang])
    @empty
      <p class="g-empty">Belum ada data utang.</p>
    @endforelse
  </div>

  <h2 class="g-title" style="margin-top:40px">Cicilan Terbaru</h2>
  <ul class="g-list">
    @forelse ($cicilans as $cicilan)
      @include('partials.guest-cicilan-item', ['cicilan' => $cicilan])
    @empty
      <li class="g-empty">Belum ada data cicilan.</li>
    @endforelse
  </ul>
</div>
@endsection
