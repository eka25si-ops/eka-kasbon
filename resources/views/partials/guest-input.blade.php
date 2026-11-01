<div class="mb-4">
  <label class="block font-semibold mb-1">{{ $label }}</label>
  <input type="{{ $type ?? 'text' }}" name="{{ $name }}"
         value="{{ ($type ?? 'text') === 'password' ? '' : old($name) }}"
         class="w-full border rounded-lg px-3 py-2 @error($name) border-red-500 @enderror">
  @error($name)
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
  @enderror
</div>
