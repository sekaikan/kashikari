<header>
    <nav class="navbar navbar-expand-lg navbar-extend">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-left" href="/home">Kashikari</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @if (Auth::check())
                        <form class="form-inline" action="{{url('/results/')}}">
                            <div class="form-group mr-2">
                                <input type="text" name="keyword" value="" class="form-control" placeholder="Find Items">
                            </div>
                            <input type="submit" value="Search" class="btn btn-outline-success">
                        </form>
                         <li class="dropdown">
                                <a href="#" class="dropdown-toggler ml-3" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">My Page</a>
                                        <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">Profile Setting</a>
                                        <a class ="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
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