<div class="list-group-item">
    <img class="mr-3" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" width="32px">
    <a href="{{ route('users.show', $user->id) }}">
        {{ $user->name }}
    </a>
</div>
