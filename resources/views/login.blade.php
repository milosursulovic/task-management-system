@extends('main')

@section('container')
    <form method="post" action="{{ route('login') }}" id="login-form">
        @csrf
        <h2>{{ __('Login') }}</h2>
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input type="password" id="password" name="password" required>
        </div>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <button type="submit" class="btn">{{ __('Login') }}</button>
        <div class="form-group">
            <a href="{{ route('register') }}">{{ __('Don\'t have account? Register') }}</a>
        </div>
    </form>
@endsection