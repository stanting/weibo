@extends('layouts.default')

@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <section class="user-info">
                @include('shared._user_info', compact('user'))
            </section>
            <section class="status">
                @if ($statuses->count() > 0)
                    <ul class="list-unstyled">
                        @foreach ($statuses as $status)
                            @include('statuses._status')
                        @endforeach
                    </ul>
                    <div class="mt-5">
                        {!! $statuses->render() !!}
                    </div>
                @else
                    <p>Data is empty!</p>
                @endif
            </section>
        </div>
    </div>
@endsection
