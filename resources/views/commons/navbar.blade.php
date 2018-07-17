<header>
    <nav class="navbar navbar-expand-lg navbar-extend fixed-top">
        <div class="container">
            <div class="navbar-header">
                @if (Auth::check())
                <a class="navbar-brand navbar-left" href="/home">Kashikari</a> @else
                <a class="navbar-brand navbar-left" href="/">Kashikari</a> @endif
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <a class="nav-link" href="#">About Us</a>
                    @if (Auth::check())
                        <?php $url = $_SERVER['REQUEST_URI'];?>
                        @if(strstr($url,'groupsearch') || strstr($url,'home'))
                        <div class="nav-link">
                            <a data-toggle="collapse" href="#navbar-search" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                        <div class="collapse width" id="navbar-search">
                                <form class="form-inline" action="{{url('/results/groupsearch')}}">
                                    <div class="form-group mr-2">
                                        <input type="text" name="keyword" value="" class="form-control bg-transparent" placeholder="Find Groups">
                                    </div>
                                    <!--input type="submit" value="Search" class="btn btn-outline-success"-->
                                </form>
                        </div>
                        <!-- Split dropleft button -->
                        {{--
                        <form class="form-inline" action="{{url('/results/groupsearch')}}">
                            <div class="form-group mr-2">
                                <input type="text" name="keyword" value="" class="form-control" placeholder="Find Groups">
                            </div>
                            <input type="submit" value="Search" class="btn btn-outline-success">
                        </form> --}}
                    @else
                        <form class="form-inline" action="{{url('/results/')}}">
                            <div class="form-group mr-2">
                                <input type="text" name="keyword" value="" class="form-control" placeholder="Find Items">
                            </div>
                            <input type="submit" value="Search" class="btn btn-outline-success">
                        </form>
                    @endif
                       <?php $notifications = Auth::user()->notifications()->paginate(5); ?>
                       @if($notifications->count()==0)
                       <a tabindex="0" class="navbar-item btn btn-link text-info" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-html="true" title="Dismissible popover" data-content="
                       <i class='far fa-thumbs-up'></i> You have no new notifications.
                       "><i class="far fa-bell"></i>{{ Auth::user()->notifications()->count() }}</a>
                       @else
                           <a tabindex="0" class="navbar-item btn btn-link text-info" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-html="true" title="Dismissible popover" data-content="
                           @foreach($notifications as $notification)
                               <a class='text-muted' href='{{url('posts/'.$notification->post_id)}}'>
                                   <strong>{{ App\User::find($notification->sender_id)->name }}</strong> sent you a reply.<br>
                                   {{ $notification->content }}
                               </a>
                               <hr>
                           @endforeach
                           "><i class="far fa-bell"></i>{{ Auth::user()->notifications()->count() }}</a>
                        @endif

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggler ml-3" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <i class="fas fa-user-circle"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">My Page</a>
                                <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">Profile Setting</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                    @else
                    <li class="nav-link"><a href="{{ route('register') }}">Sign Up</a></li>
                    <li class="nav-link"><a href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
