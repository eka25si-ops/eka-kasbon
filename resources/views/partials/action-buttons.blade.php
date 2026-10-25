<a href="{{ route($route . '.edit', $model) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route($route . '.destroy', $model) }}" method="POST" class="d-inline"
      onsubmit="return confirm('Hapus data ini?')">
  @csrf @method('DELETE')
  <button class="btn btn-danger btn-sm">Hapus</button>
</form>
