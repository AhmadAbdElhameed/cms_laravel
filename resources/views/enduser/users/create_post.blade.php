@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('assetsEnduser/js/summernote/summernote-bs4.min.css')}}">
@endsection
@section('content')
    <!-- Start Blog Area -->
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <h3>Create Post</h3>
                    <form action="route{{'enduser.users.post.store'}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="custom-control-label">{{__('Title')}}</label>
                            <input name="title" type="text" value="{{old('title')}}" class="form-control">
                            <div>
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="custom-control-label">{{__('Description')}}</label>
                            <textarea name="description" type="text" rows="10"
                                      class="form-control summernote">{{old('description')}}</textarea>
                            <div>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <label class="custom-control-label">{{__('Category')}}</label>
                                <select class="form-control" name="category">
                                    <option value="">Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @error('category')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <label class="custom-control-label">{{__('Commentable')}}</label>
                                <select class="form-control" name="comment_able">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <div>
                                    @error('comment_able')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <label class="custom-control-label">{{__('Status')}}</label>
                                <select class="form-control" name="comment_able">
                                    <option value="1">Active</option>
                                    <option value="0">In-Active</option>
                                </select>
                                <div>
                                    @error('comment_able')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row pt-4 ">
                            <div class="col-12">
                                <div class="file-loading">
                                    <input type="file" name="images[]" id="post-images" multiple>
                                </div>
                            </div>
                        </div>

                        <div class="form-group pt-4">
                            <button class="btn btn-primary">Create</button>
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



@section('scripts')
    <script src="{{asset('assetsEnduser/js/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function(){
            $('.summernote').summernote({
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            $('#post-images').fileinput({
                theme: "fa",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
            });

        })
    </script>
@endsection
