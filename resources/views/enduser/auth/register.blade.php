@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-5 offset-md-3">
                <div class="my__account__wrapper text">
                    <h3 class="account__title">{{ __('Register') }}</h3>

                    <form method="POST" action="{{ route('enduser.register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="account__form">
                            <div class="input__box">
                                <label>{{ __('Name') }}<span>*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" >
                                @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input__box">
                                <label>{{ __('Username') }}<span>*</span></label>
                                <input type="text" name="username" value="{{ old('username') }}" >
                                @error('username')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input__box">
                                <label>{{ __('Email') }}<span>*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input__box">
                                <label>{{ __('Mobile') }}<span>*</span></label>
                                <input type="number" name="mobile" value="{{ old('mobile') }}" >
                                @error('mobile')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input__box">
                                <label>{{ __('User Image') }}</label>
                                <input type="file" name="image" class="custom-file" >
                                @error('image')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input__box">
                                <label>{{ __('Bio') }}</label>
                                <input type="text" name="bio" value="{{ old('bio') }}" >
                                @error('bio')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input__box">
                                <label>{{ __('Password') }}<span>*</span></label>
                                <input type="password" name="password">
                                @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input__box">
                                <label>{{ __('Confirm Password') }}<span>*</span></label>
                                <input type="password" name="password_confirmation" id="password-confirm">
                                @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form__btn">
                                <button>{{ __('Create Account') }}</button>
                            </div>
                            <div class="mt-2">
                                <span>{{__('Have an account ? ')}}</span><a href="{{ route('enduser.login') }}">
                                    {{ __('Login') }}</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
