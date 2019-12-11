@extends('layouts.default')

@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class="user-info">
                @include('shared._user_info', compact('user'))
            </section>
        </div>
    </div>
@endsection
