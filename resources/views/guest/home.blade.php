@extends('layouts.guest')

@section('content')
<div class="text-center my-8">
    <h1 class="text-3xl font-bold text-gray-800">Selamat Datang di Kasbon</h1>
    <p class="text-gray-500 mt-2">Katalog barang pecah belah dan kebutuhan Anda</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    <!-- Card Produk Sample 1 -->
    <div class="bg-white rounded-lg shadow p-4 border border-gray-100">
        <div class="h-40 bg-gray-200 rounded-md flex items-center justify-center text-gray-400">
            Gambar Produk
        </div>
        <h3 class="font-bold text-lg mt-3">Piring Keramik</h3>
        <p class="text-orange-500 font-semibold mt-1">Rp 25.000</p>
    </div>

    <!-- Card Produk Sample 2 -->
    <div class="bg-white rounded-lg shadow p-4 border border-gray-100">
        <div class="h-40 bg-gray-200 rounded-md flex items-center justify-center text-gray-400">
            Gambar Produk
        </div>
        <h3 class="font-bold text-lg mt-3">Gelas Kaca Set</h3>
        <p class="text-orange-500 font-semibold mt-1">Rp 45.000</p>
    </div>
</div>
@endsection