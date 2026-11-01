@extends('layouts.guest')
@section('title', 'Home')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-10">
  <h1 class="text-3xl font-bold text-center">Selamat Datang di Kasbon</h1>
  <p class="text-center text-gray-500 mb-8">Katalog barang pecah belah dan kebutuhan Anda</p>
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-4">
      <img src="{{ asset('images/piring.jpg') }}" alt="Piring Keramik" class="w-full h-40 object-cover rounded-lg mb-3">
      <h3 class="font-bold">Piring Keramik</h3>
      <p class="text-orange-500 font-semibold">Rp 25.000</p>
    </div>
    <div class="bg-white rounded-lg shadow p-4">
      <img src="{{ asset('images/gelas.jpg') }}" alt="Gelas Kaca Set" class="w-full h-40 object-contain bg-white rounded-lg mb-3">
      <h3 class="font-bold">Gelas Kaca Set</h3>
      <p class="text-orange-500 font-semibold">Rp 45.000</p>
    </div>
  </div>
</div>
@endsection
