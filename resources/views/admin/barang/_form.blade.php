@php
  $fields = [
    'nama' => 'Nama Barang',
    'kategori' => 'Kategori',
    'harga_eceran' => 'Harga Eceran',
    'harga_grosir' => 'Harga Grosir',
    'stok' => 'Stok',
  ];
@endphp

@foreach ($fields as $name => $label)
  <div class="form-group">
    <label>{{ $label }}</label>
    <input type="{{ in_array($name, ['nama','kategori']) ? 'text' : 'number' }}"
           name="{{ $name }}"
           class="form-control @error($name) is-invalid @enderror"
           value="{{ old($name, $barang->$name ?? '') }}">
    @error($name)
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
@endforeach