<div class="form-group">
  <label>Utang</label>
  <select name="utang_id" class="form-control @error('utang_id') is-invalid @enderror">
    <option value="">-- Pilih Utang --</option>
    @foreach ($utangs as $u)
      <option value="{{ $u->id }}" {{ old('utang_id', $cicilan->utang_id ?? '') == $u->id ? 'selected' : '' }}>
        {{ $u->nama_pelanggan }} - {{ $u->keterangan }} (Rp {{ number_format($u->jumlah, 0, ',', '.') }})
      </option>
    @endforeach
  </select>
  @error('utang_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

@include('partials.form-field', ['name' => 'tanggal_bayar', 'label' => 'Tanggal Bayar', 'type' => 'date', 'value' => $cicilan->tanggal_bayar ?? ''])
@include('partials.form-field', ['name' => 'jumlah_bayar', 'label' => 'Jumlah Bayar (Rp)', 'type' => 'number', 'value' => $cicilan->jumlah_bayar ?? ''])
@include('partials.form-field', ['name' => 'catatan', 'label' => 'Catatan', 'value' => $cicilan->catatan ?? ''])
