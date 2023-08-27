@extends('layouts.app')

@section('content')

    <div class="col-lg-8 offset-md-2 mt-5">
        <div class="my__account__wrapper">

            <h3 class="account__title">{{ __('Reset Password') }}</h3>
            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="account__form">

                    <div class="input__box">
                        <label>Email <span>*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}">

                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form__btn">
                        <button type="submit">{{ __('Send Password Reset Link') }}</button>
                    </div>

                    <a class="forget_pass" href="{{ route('enduser.login') }}">Go To LogIn?</a>
                </div>

            </form>
        </div>
    </div>



@endsection
