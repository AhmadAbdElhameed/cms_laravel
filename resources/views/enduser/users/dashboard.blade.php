@extends('layouts.app')

@section('content')
    <!-- Start Blog Area -->
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Comments</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($posts as $post)
                                    <tr>
                                        <td>{{\Illuminate\Support\Str::limit($post->title,50,'...') }}</td>
                                        <td>{{$post->comments_count}}</td>
                                        <td>{{$post->status}}</td>
                                        <td><a href="{{route('enduser.dashboard')}}"
                                            class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td><a href="{{route('enduser.dashboard')}}"
                                            class="btn btn-sm btn-danger"
                                            onclick="if(confirm('Are you sure ,you want to delete this post'))
                                            {document.getElementById('post-delete-{{$post->id}}').submit();}
                                            else {return false}"><i class="fa fa-trash"></i></a>
                                            <form action="{{route('enduser.dashboard')}}" id="post-delete-{{$post->id}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>

                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No posts found</td>
                                </tr>
                                @endforelse

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="4">{!! $posts->links() !!}</td>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    @include('partials.enduser.users.sidebar')
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->
@endsection
