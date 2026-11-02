<div class="g-card">
  <h5>{{ $utang->pelanggan->nama ?? '-' }}</h5>
  <div>{{ $utang->keterangan }}</div>
  <div class="amt">Rp {{ number_format($utang->jumlah, 0, ',', '.') }}</div>
  <small>Jatuh tempo: {{ \Carbon\Carbon::parse($utang->jatuh_tempo)->format('d M Y') }}</small><br>
  <span class="g-badge {{ $utang->status === 'lunas' ? 'lunas' : 'belum' }}">{{ $utang->status }}</span>
</div>
