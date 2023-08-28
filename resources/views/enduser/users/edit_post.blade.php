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
                    <h3>Update Post</h3>
                    <form action="{{route('enduser.users.post.update',$post)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="custom-control-label">{{__('Title')}}</label>
                            <input name="title" type="text" value="{{$post->title}}" class="form-control">
                            <div>
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="custom-control-label">{{__('Description')}}</label>
                            <textarea name="description" type="text" rows="10"
                                      class="form-control summernote">{{$post->description}}</textarea>
                            <div>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <label class="custom-control-label">{{__('Category')}}</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Select</option>
                                    @foreach($categories as $category)
                                        <option {{$category->id == $post->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @error('category_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <label class="custom-control-label">{{__('Commentable')}}</label>
                                <select class="form-control" name="comment_able">
                                    <option {{$post->comment_able == 1 ? 'selected' : ''}} value="1">Yes</option>
                                    <option {{$post->comment_able == 0 ? 'selected' : ''}} value="0">No</option>
                                </select>
                                <div>
                                    @error('comment_able')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <label class="custom-control-label">{{__('Status')}}</label>
                                <select class="form-control" name="status">
                                    <option {{$post->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$post->status == 0 ? 'selected' : ''}} value="0">In-Active</option>
                                </select>
                                <div>
                                    @error('status')
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
                initialPreview:[
                    @if($post->media->count() > 0)
                        @foreach($post->media as $media)
                            "{{ asset('assets/posts/'.$media->file_name) }}",
                        @endforeach
                    @endif


                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig:[
                        @if ($post->media->count() > 0)
                        @foreach ($post->media as $media )
                    {
                        caption: "{{ $media->file_name }}",
                        size: "{{ $media->file_size }}",
                        width: "{{ '120px' }}",
                        url: "{{ route('enduser.users.post.media.delete', [$media->id, '_token' => csrf_token()]) }}",
                        key: "{{ $media->id }}"
                    },
                    @endforeach
                    @endif
                ],
            });

        })
    </script>
@endsection
