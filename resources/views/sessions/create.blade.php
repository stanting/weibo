@extends('layouts.default')

@section('title', 'Login')

@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Login</h5>
            </div>
            <div class="card-body">
                @include('shared._errors')

                <form action=""{{ route('login') }} method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            Remember me
                          </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <hr>
                <p>Don’t have an account? <a href="{{ route('signup') }}">Sign up</a></p>
            </div>
        </div>
    </div>
@endsection
