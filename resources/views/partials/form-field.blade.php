@php $type = $type ?? 'text'; @endphp
<div class="form-group">
  <label>{{ $label }}</label>
  <input type="{{ $type }}" name="{{ $name }}"
         class="form-control @error($name) is-invalid @enderror"
         value="{{ $type === 'password' ? '' : old($name, $value ?? '') }}">
  @isset($hint)
    <small class="form-text text-muted">{{ $hint }}</small>
  @endisset
  @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
