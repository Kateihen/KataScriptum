@extends('layouts.app')

@section('content')
    <h3>Register</h3>
    <div>
        <form method="POST" action="/register">
            @csrf
            <div>
                <label for="name">{{ __('Name') }}</label>

                <div>
                    <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="email" >{{ __('E-Mail Address') }}</label>
                <div>
                    <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password">{{ __('Password') }}</label>
                <div>
                    <input type="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <div>
                    <input type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div>
                <div>
                    <button type="submit">{{ __('Register') }}</button>
                </div>
            </div>

        </form>
    </div>

@endsection
