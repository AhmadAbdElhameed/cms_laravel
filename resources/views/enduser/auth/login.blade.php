@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 mt-5 offset-md-3">
            <div class="my__account__wrapper text">
                <h3 class="account__title">{{ __('Login') }}</h3>

                <form method="POST" action="{{ route('enduser.login') }}">
                    @csrf
                    <div class="account__form">
                        <div class="input__box">
                            <label>{{ __('Username') }}<span>*</span></label>
                            <input type="text" name="username" value="{{ old('username') }}">
                            @error('username')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input__box">
                            <label>{{ __('Password') }}<span>*</span></label>
                            <input type="password" name="password">
                            @error('password')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form__btn">
                            <button>{{ __('Login') }}</button>
                            <label class="label-for-checkbox">
                                <input  class="input-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>{{ __('Remember Me') }}</span>
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="forget_pass" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
