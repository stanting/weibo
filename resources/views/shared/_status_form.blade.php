<form action="{{ route('statuses.store') }}" method="POST">
    @include('shared._errors')
    @csrf
    <textarea class="form-control" name="content" id="" cols="30" rows="3" placeholder="Talk about something new..."></textarea>
    <div class="text-right">
        <button type="submit" class="btn btn-primary mt-3">Publish</button>
    </div>
</form>
