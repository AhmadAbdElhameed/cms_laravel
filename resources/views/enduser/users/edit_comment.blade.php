@extends('layouts.app')

@section('content')
    <!-- Start Blog Area -->
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <h4>Edit Comment on : <span style="font-weight: bold;color: #244ec9">{{$comment->post->title}}</span> </h4>
                    <form class="mt-5" action="{{route('enduser.users.comments.update',$comment)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row ">

                            <div class="col-3">
                                <div class="form-group">
                                    <label class="custom-control-label">{{__('Name')}}</label>
                                    <input name="name" type="text" value="{{$comment->name}}" class="form-control">
                                    <div>
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label class="custom-control-label">{{__('Email')}}</label>
                                    <input name="email" type="text" value="{{$comment->email}}" class="form-control">
                                    <div>
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label class="custom-control-label">{{__('Website')}}</label>
                                    <input name="url" type="text" value="{{$comment->url}}" class="form-control">
                                    <div>
                                        @error('url')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <label class="custom-control-label">{{__('Status')}}</label>
                                <select class="form-control" name="status">
                                    <option {{$comment->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$comment->status == 0 ? 'selected' : ''}} value="0">In-Active</option>
                                </select>
                                <div>
                                    @error('status')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label class="custom-control-label">{{__('Comment')}}</label>
                                <textarea name="comment" type="text" rows="10"
                                          class="form-control">{{$comment->comment}}</textarea>
                                <div>
                                    @error('comment')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>





                        <div class="form-group pt-4">
                            <button class="btn btn-primary">Update</button>
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


