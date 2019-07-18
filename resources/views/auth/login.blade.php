@extends('layouts.app')

@section('title', ': Login')

@section('content')
    <div>
    <form method="POST" action="/login">
        @csrf
        <div>
            <label for="email">{{ __('E-Mail Address') }}</label>

            <div>
                <input type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span >
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div>
            <label for="password" >{{ __('Password') }}</label>

            <div>
                <input type="password" name="password" required autocomplete="current-password">

                @error('password')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        <div>
            <button type="submit">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a href="/password/reset">
                    {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
    </form>

    <h4>Don't have an account?</h4>
    <a href="/register">Register</a>
    </div>
@endsection
