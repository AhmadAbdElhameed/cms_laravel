@extends('layouts.app')

@section('content')

    <div class="col-lg-8 offset-md-2 mt-5">
        <div class="my__account__wrapper">
            <h3 class="account__title">Reset Password</h3>

            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="account__form">

                    <div class="input__box">
                        <label>{{ __('Email Address') }} <span>*</span></label>
                        <input type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input__box">
                        <label>{{ __('Password') }}<span>*</span></label>
                        <input type="password" name="password" id="password" autocomplete="new-password">

                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input__box">
                        <label>{{ __('Confirm Password') }}<span>*</span></label>
                        <input type="password" name="password_confirmation" id="password-confirm" >

                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form__btn">
                        <button type="submit">{{ __('Reset Password') }}</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
