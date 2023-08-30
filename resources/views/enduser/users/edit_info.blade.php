@extends('layouts.app')

@section('content')
    <!-- Start Blog Area -->
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <h3 class="mt-5">Update Information</h3>
                    <form class="mt-3" action="{{route('enduser.info.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="row">
                            <div class="col-12">
                                @if(auth()->user()->image != '')
                                    <div class="col-12">
                                        <img src="{{asset('assets/users/'.auth()->user()->image)}}"
                                             width="150" alt="{{auth()->user()->name}}" class="img-fluid">
                                    </div>
                                @endif
                                <div class="form-group mt-2">
                                    <label class="custom-control-label">{{__('Profile image')}}</label>
                                    <input name="image" type="file" class="form-control">
                                </div>
                                <div>
                                    @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-3">
                                <label class="custom-control-label">{{__('Name')}}</label>
                                <input name="name" type="text" value="{{auth()->user()->name}}" class="form-control">
                                <div>
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-3">
                                <label class="custom-control-label">{{__('Email')}}</label>
                                <input name="email" type="email" value="{{auth()->user()->email}}" class="form-control">
                                <div>
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-3">
                                <label class="custom-control-label">{{__('Mobile')}}</label>
                                <input name="mobile" type="text" value="{{auth()->user()->mobile}}" class="form-control">
                                <div>
                                    @error('mobile')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-3">
                                <label class="custom-control-label">{{__('Receive Email')}}</label>
                                <select class="form-control" name="receive_email">
                                    <option {{auth()->user()->receive_email == 1 ? 'selected' : ''}} value="1">Yes</option>
                                    <option {{auth()->user()->receive_email == 0 ? 'selected' : ''}} value="0">No</option>
                                </select>
                                <div>
                                    @error('receive_email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row">

                            <div class="col-12">
                                <label class="custom-control-label">{{__('Bio')}}</label>
                                <textarea name="bio" type="text" class="form-control">{{auth()->user()->bio}}</textarea>
                                <div>
                                    @error('bio')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group pt-4">
                            <button class="btn btn-primary">Update</button>
                        </div>

                    </form>



                    <hr>



                    <h3 class="mt-5">Update Password</h3>
                    <form class="mt-3" action="{{route('enduser.password.update')}}" method="POST">
                        @csrf
                        @method('PUT')



                        <div class="row">
                            <div class="col-3">
                                <label class="custom-control-label">{{__('Current Password')}}</label>
                                <input name="current_password" type="password" class="form-control">
                                <div>
                                    @error('current_password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-3">
                                <label class="custom-control-label">{{__('New Password')}}</label>
                                <input name="password" type="password"  class="form-control">
                                <div>
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-3">
                                <label class="custom-control-label">{{__('Confirm Password')}}</label>
                                <input name="password_confirmation" type="password" class="form-control">
                                <div>
                                    @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group pt-4">
                            <button class="btn btn-primary">Update Password</button>
                        </div>

                    </form>

                </div>
                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    @include('partials.enduser.users.sidebar')
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->
@endsection
