@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h1>Hello Laravel</h1>
        <p class="lead">Now you see <a href="./">Index</a></p>
        <p>Start here</p>
        <p>
            <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">Register</a>
        </p>
    </div>
@endsection
