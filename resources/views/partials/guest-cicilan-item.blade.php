<li>
  <div>
    <strong>{{ $cicilan->nama_pelanggan ?? '-' }}</strong>
    <div class="sub">{{ $cicilan->keterangan }} &middot; {{ \Carbon\Carbon::parse($cicilan->tanggal_bayar)->format('d M Y') }}</div>
  </div>
  <strong>Rp {{ number_format($cicilan->jumlah_bayar, 0, ',', '.') }}</strong>
</li>
