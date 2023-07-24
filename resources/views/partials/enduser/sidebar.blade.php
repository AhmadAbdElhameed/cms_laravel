<div class="wn__sidebar">
    <!-- Start Single Widget -->
    <aside class="widget search_widget">
        <h3 class="widget-title">Search</h3>
        <form action="{{route('index.search')}}">
            @csrf
            <div class="form-input">
                <input name="keyword" value="{{old('keyword')}}" type="text" placeholder="Search...">
                @if ($errors->has('keyword'))
                    <span class="text-danger">{{ $errors->first('keyword') }}</span>
                @endif
                <button><i class="fa fa-search"></i></button>
            </div>
        </form>
    </aside>
    <!-- End Single Widget -->
    <!-- Start Single Widget -->
    <aside class="widget recent_widget">
        <h3 class="widget-title">Recent Posts</h3>
        <div class="recent-posts">
            <ul>
                @foreach($recent_posts as $recent_post)
                    <li>
                        <div class="post-wrapper d-flex">
                            <div class="thumb">
                                <a href="{{route('post.show' , $recent_post->slug)}}">
                                    @if($recent_post->media->count() > 0)
                                        <img src="{{asset('assets/posts/' . $recent_post->media->first()->filename)}}" alt="{{$recent_post->title}}">
                                    @else
                                        <img src="{{asset('assets/posts/default.png')}}" alt="{{$recent_post->title}}">
                                    @endif
                                </a>
                            </div>
                            <div class="content">
                                <h4><a href="{{route('post.show' , $recent_post->slug)}}">{{\Illuminate\Support\Str::limit($recent_post->title,18,'...')}}</a></h4>
                                <p>{{$recent_post->created_at->format('M d ,Y')}}</p>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </aside>
    <!-- End Single Widget -->
    <!-- Start Single Widget -->
    <aside class="widget comment_widget">
        <h3 class="widget-title">Comments</h3>
        <ul>
            <li>
                <div class="post-wrapper">
                    <div class="thumb">
                        <img src="{{asset('assetsEnduser/images/blog/comment/1.jpeg')}}" alt="Comment images">
                    </div>
                    <div class="content">
                        <p>demo says:</p>
                        <a href="#">Quisque semper nunc vitae...</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="post-wrapper">
                    <div class="thumb">
                        <img src="{{asset('assetsEnduser/images/blog/comment/1.jpeg')}}" alt="Comment images">
                    </div>
                    <div class="content">
                        <p>Admin says:</p>
                        <a href="#">Curabitur 999 aliquet pulvinar...</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="post-wrapper">
                    <div class="thumb">
                        <img src="{{asset('assetsEnduser/images/blog/comment/1.jpeg')}}" alt="Comment images">
                    </div>
                    <div class="content">
                        <p>Irin says:</p>
                        <a href="#">Quisque semper nunc vitae...</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="post-wrapper">
                    <div class="thumb">
                        <img src="{{asset('assetsEnduser/images/blog/comment/1.jpeg')}}" alt="Comment images">
                    </div>
                    <div class="content">
                        <p>Boighor says:</p>
                        <a href="#">Quisque semper nunc vitae...</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="post-wrapper">
                    <div class="thumb">
                        <img src="{{asset('assetsEnduser/images/blog/comment/1.jpeg')}}" alt="Comment images">
                    </div>
                    <div class="content">
                        <p>demo says:</p>
                        <a href="#">Quisque semper nunc vitae...</a>
                    </div>
                </div>
            </li>
        </ul>
    </aside>
    <!-- End Single Widget -->
    <!-- Start Single Widget -->
    <aside class="widget category_widget">
        <h3 class="widget-title">Categories</h3>
        <ul>
            <li><a href="#">Fashion</a></li>
            <li><a href="#">Creative</a></li>
            <li><a href="#">Electronics</a></li>
            <li><a href="#">Kids</a></li>
            <li><a href="#">Flower</a></li>
            <li><a href="#">Books</a></li>
            <li><a href="#">Jewelle</a></li>
        </ul>
    </aside>
    <!-- End Single Widget -->
    <!-- Start Single Widget -->
    <aside class="widget archives_widget">
        <h3 class="widget-title">Archives</h3>
        <ul>
            <li><a href="#">March 2015</a></li>
            <li><a href="#">December 2014</a></li>
            <li><a href="#">November 2014</a></li>
            <li><a href="#">September 2014</a></li>
            <li><a href="#">August 2014</a></li>
        </ul>
    </aside>
    <!-- End Single Widget -->
</div>
