@php
  $fields = [
    'nama' => 'Nama Supplier',
    'no_hp' => 'No HP',
    'alamat' => 'Alamat',
  ];
@endphp

@foreach ($fields as $name => $label)
  <div class="form-group">
    <label>{{ $label }}</label>
    <input type="text" name="{{ $name }}"
           class="form-control @error($name) is-invalid @enderror"
           value="{{ old($name, $supplier->$name ?? '') }}">
    @error($name)
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
@endforeach