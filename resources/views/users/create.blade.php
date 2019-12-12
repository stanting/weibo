@extends('layouts.default')

@section('title', 'Register')

@section('content')
<div class="offset-md-2 col-md-8">
    <div class="card">
        <div class="card-header">
            <h5>Register</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                  <label for="password">Password:</Password:></label>
                  <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                </div>
                <div class="form-group">
                  <label for="password_confirmation">Password confirmation:</label>
                  <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection
