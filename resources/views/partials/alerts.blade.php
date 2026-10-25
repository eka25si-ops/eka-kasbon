@foreach (['success' => 'success', 'error' => 'danger'] as $key => $type)
  @if (session($key))
    <div class="alert alert-{{ $type }} alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert"><span>&times;</span></button>
        {{ session($key) }}
      </div>
    </div>
  @endif
@endforeach
