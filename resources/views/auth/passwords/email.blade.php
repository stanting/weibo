@extends('layouts.default')

@section('title', 'Reset password')

@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Reset password</h5>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="form-text">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Send password reset email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
