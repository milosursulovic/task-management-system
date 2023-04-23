@extends('main')

@section('container')
    <form method="post" action="{{ route('register') }}" id="register-form">
        @csrf
        <h2>{{ __('Register') }}</h2>
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
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
        <div class="form-group">
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <button type="submit" class="btn">{{ __('Register') }}</button>
        <div class="form-group">
            <a href="{{ route('login') }}">{{ __('Already have account? Login') }}</a>
        </div>
    </form>
@endsection
