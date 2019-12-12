@foreach (['danger', 'warning', 'success', 'info'] as $type)
    @if (session()->has($type))
    <div class="alert alert-{{ $type }}">
        {{ session()->get($type) }}
    </div>
    @endif
@endforeach
