<div class="form-group">
  <label>Pelanggan</label>
  <select name="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror">
    <option value="">-- Pilih Pelanggan --</option>
    @foreach ($pelanggans as $p)
      <option value="{{ $p->id }}" {{ old('pelanggan_id', $utang->pelanggan_id ?? '') == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
    @endforeach
  </select>
  @error('pelanggan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

@include('partials.form-field', ['name' => 'keterangan', 'label' => 'Keterangan', 'value' => $utang->keterangan ?? ''])
@include('partials.form-field', ['name' => 'jumlah', 'label' => 'Jumlah (Rp)', 'type' => 'number', 'value' => $utang->jumlah ?? ''])
@include('partials.form-field', ['name' => 'jatuh_tempo', 'label' => 'Jatuh Tempo', 'type' => 'date', 'value' => $utang->jatuh_tempo ?? ''])

<div class="form-group">
  <label>Status</label>
  <select name="status" class="form-control @error('status') is-invalid @enderror">
    @foreach (['belum lunas', 'lunas'] as $s)
      <option value="{{ $s }}" {{ old('status', $utang->status ?? 'belum lunas') === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
    @endforeach
  </select>
  @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
