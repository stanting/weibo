@extends('layouts.default')

@section('content')
    @if (Auth::check())
        <div class="row">
            <div class="col-md-8">
                <section class="status-form">
                    @include('shared._status_form')
                </section>
                <h4>Weibo list</h4>
                <hr>
                @include('shared._feed')
            </div>
            <aside class="col-md-4">
                <section class="user-info">
                    @include('shared._user_info', ['user' => Auth::user()])
                </section>
            </aside>
        </div>
    @else
        <div class="jumbotron">
            <h1>Hello Laravel</h1>
            <p class="lead">Now you see <a href="./">Index</a></p>
            <p>Start here</p>
            <p>
                <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">Register</a>
            </p>
        </div>
    @endif
@endsection
