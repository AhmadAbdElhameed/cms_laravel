<div class="wn__sidebar">

    <!-- Start Single Widget -->
    <aside class="widget recent_widget">
        <ul >
            <li class="list-group-item">
                <img  src="{{asset('assetsEnduser/uploads/profile.jpg')}}" alt="{{auth()->user()->name}}">
            </li>
            <li class="list-group-item"><a  href="{{route('enduser.dashboard')}}">My Posts</a></li>
            <li class="list-group-item"><a  href="{{route('enduser.dashboard')}}">Create Post</a></li>
            <li class="list-group-item"><a  href="{{route('enduser.dashboard')}}">Manage Comments</a></li>
            <li class="list-group-item"><a  href="{{route('enduser.dashboard')}}">Update Information</a></li>
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

