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
                                    <th>Name</th>
                                    <th>Post</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($comments as $comment)
                                    <tr>
                                        <td>{{$comment->name}}</td>
                                        <td>{{$comment->post->title}}</td>
                                        <td>{{$comment->status}}</td>
                                        <td><a href="{{route('enduser.users.comments.edit',$comment)}}"
                                            class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td><a href="javascript:void(0);"
                                            class="btn btn-sm btn-danger"
                                            onclick="if(confirm('Are you sure ,you want to delete this comment'))
                                            {document.getElementById('post-delete-{{$comment->id}}').submit();}
                                            else {return false}"><i class="fa fa-trash"></i></a>
                                            <form action="{{route('enduser.users.comments.delete',$comment)}}"
                                                  method="POST" id="post-delete-{{$comment->id}}">
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
                                    <td colspan="4">{!! $comments->links() !!}</td>
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
