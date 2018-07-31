    <nav class="navbar navbar-expand-lg navbar-extend fixed-top" style="background-color:#24292E;" >
        <div class="container">
            <div class="navbar-header">
                <?php $url = $_SERVER['REQUEST_URI'];?>
                @if (Auth::check())
                    @if(strstr($url,'search') || strstr($url,'create'))
                    <a class="navbar-brand navbar-left text-light" href="/home">Kashikari</a>
                    @elseif(strstr($url,'group'))
                      <a class="navbar-brand navbar-left  text-light" href="{{route('group.show', ['id' => $group->id])}}">Kashikari <span class="navbar-brand text-muted">|</span>{!! $group->name !!}</a>
                    @else
                      <a class="navbar-brand navbar-left text-light" href="/home">Kashikari</a>
                    @endif
                    
                @else
                <a class="navbar-brand navbar-left  text-light" href="/">Kashikari</a>
                @endif
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <?php $url = $_SERVER['REQUEST_URI'];?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @if(strstr($url,'home'))
                    @else
                    <a class="nav-link  text-light" href="{{route('home')}}">GroupList</a>
                    @endif
                    <a class="nav-link  text-light" href="{{route('about')}}">About Us</a>
                    @if (Auth::check())
                        @if(strstr($url,'about')|| strstr($url,'home'))
                        @elseif(strstr($url,'search'))
                            <div class="nav-link">
                                <a data-toggle="collapse" href="#navbar-search" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-search  text-light"></i>
                                </a>
                            </div>
                            <div class="collapse width" id="navbar-search">
                                    <form class="form-inline" action="{{url('/results/search')}}">
                                        <div class="form-group mr-2 bg-light">
                                            <input type="text" name="keyword" value="" class="form-control bg-transparent" placeholder="Find Groups">
                                        </div>
                                        <!--input type="submit" value="Search" class="btn btn-outline-success"-->
                                    </form>
                            </div>
                        
                        @else
                            <div class="nav-link">
                                <a data-toggle="collapse" href="#navbar-search" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-search  text-light"></i>
                                </a>
                            </div>
                            <div class="collapse width" id="navbar-search">
                                    <form class="form-inline" action="{{url('/results/')}}">
                                        <div class="form-group mr-2 bg-light">
                                            <input type="text" name="keyword" value="" class="form-control bg-transparent" placeholder="Find Items">
                                        </div>
                                        <!--input type="submit" value="Search" class="btn btn-outline-success"-->
                                    </form>
                            </div>
                        @endif
                        <?php $notifications = \DB::table('notifications')->where('recipient_id', \Auth::id())->orderBy('created_at', 'desc')->paginate(5); ?>
                       @if($notifications->count()==0)
                       <a tabindex="0" class="navbar-item btn btn-link text-dark" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-html="true" title="Notifications" 
                       data-content="<i class='far fa-thumbs-up'></i> You have no new notifications."><i class="far fa-bell  text-light"></i></a>
                       @else
                               <a tabindex="0" class="navbar-item btn btn-link text-dark" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-html="true" title="Notifications" data-content="
                                @foreach($notifications as $notification)
                                 @if($notification->type=='cancel')
                                        <a class='text-muted' href='{{url('/notifications/open_delete?notification_id='.$notification->id.'&item_id='.$notification->item_id.'&type=toItem')}}'>
                                           <strong>{{ App\User::find($notification->user_id)->name }}</strong> cenceled request for {{ $notification->content }}.
                                 @elseif($notification->post_id != NULL && $notification->item_id == NULL)
                                       <a class='text-muted' href='{{url('/notifications/open_delete?notification_id='.$notification->id.'&post_id='.$notification->post_id.'&type=toPost')}}'>
                                           <strong>{{ App\User::find($notification->user_id)->name }}</strong> sent you a reply.<br>
                                           {{ $notification->content }}
                                 @elseif(($notification->post_id == NULL && $notification->item_id != NULL) && ($notification->type == 'toItem' || $notification->type == 'toComment') )
                                        <a class='text-muted' href='{{url('/notifications/open_delete?notification_id='.$notification->id.'&item_id='.$notification->item_id.'&type=toItem')}}'>
                                           <strong>{{ App\User::find($notification->user_id)->name }}</strong> Commented.<br>
                                           {{ $notification->content }}
                                @elseif($notification->post_id == NULL && $notification->item_id != NULL)
                                        <a class='text-muted' href='{{url('/notifications/open_delete?notification_id='.$notification->id.'&item_id='.$notification->item_id.'&type=toItem')}}'>
                                           <strong>{{ App\User::find($notification->user_id)->name }}</strong> sent you a requset.<br>
                                           {{ $notification->content }}
                                @endif
                                       </a>
                                       <hr>
                               @endforeach
                               ">
                        <i class="far fa-bell text-light"></i><span class="badge badge-pill badge-warning">{{ $notifications->count() }}</span></a>
                        @endif
                        
                        @if(strstr($url,'group') && (Auth::user()->is_following($group->id)))
                            <a class="nav-link" href="{{route('chats.index',['id' => $group->id])}}"><i class="far fa-comments  text-light"></i></a>
                        @endif

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggler ml-3  text-light" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <img src="{{ Auth::user()->photo }}" class="img-fluid rounded-circle" style="height: 2em; width:2em;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">My Page</a>
                                <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">Profile Setting</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout
                                        </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                    @else
                    <li class="nav-link"><a href="{{ route('register') }}"class="text-light">SignUp</a></li>
                    <li class="nav-link"><a href="{{ route('login') }}" class="text-light">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
