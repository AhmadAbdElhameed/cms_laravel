<div class="wn__sidebar">

    <!-- Start Single Widget -->
    <aside class="widget recent_widget">
        <ul >
            <li class="list-group-item">
                <img  src="{{asset('assets/users/'.auth()->user()->image)}}" alt="{{auth()->user()->name}}">
            </li>
            <li class="list-group-item"><a  href="{{route('enduser.dashboard')}}">My Dashboard</a></li>
            <li class="list-group-item"><a  href="{{route('enduser.dashboard')}}">My Posts</a></li>
            <li class="list-group-item"><a  href="{{route('enduser.users.post.create')}}">Create Post</a></li>
            <li class="list-group-item"><a  href="{{route('enduser.users.comments')}}">Manage Comments</a></li>
            <li class="list-group-item"><a  href="{{route('enduser.info.edit')}}">Update Information</a></li>
            <li class="list-group-item"><a  href="{{route('enduser.dashboard')}}"
                                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('enduser.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </aside>
    <!-- End Single Widget -->

</div>

