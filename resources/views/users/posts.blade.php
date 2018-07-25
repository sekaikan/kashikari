@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row userpage">
        <div class="col-3 mt-4 mb-2 jumbotron-home text-white px-0">
            <div class="text-center mt-4">
                <img class="usershowicon" src="{{ $user->photo }}"> 
                <h2>{!! $user->name !!}</h2>
                <p class="lead mt-3 text-light text-center"><i class="fas fa-quote-left fa-xs text-white-50 mr-3"></i>{{ $user->content }}<i class="fas fa-quote-right fa-xs text-white-50 ml-3"></i></p>
            </div>
            <div class="text-center mt-4 pb-5">
                <ul class="nav flex-column nav-pills"  role="tablist" aria-orientation="vertical">
                    <li class="nav-item" class=""><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link" style="text-decoration: none; color: white;">ITEMS <span class="badge badge-warning">{{$items->count()}}</span></a></li>
                    <li class="nav-item active" class=""><a href="{{ route('users.posts', ['id' => $user->id]) }}" class="nav-link" style="text-decoration: none; color: white;"> POSTS <span class="badge badge-warning">{{$posts->count()}}</span></a></li>
                    <li class="nav-item" class=""><a href="{{ route('users.follows', ['id' => $user->id]) }}" class="nav-link" style="text-decoration: none; color: white;"> GROUPS <span class="badge badge-warning">{{$follow_groups->count()}}</span></a></li>
                </ul>
            </div>
             @if(Auth::user()->id == $user->id)
             <div class="offset-6 mt-5 pt-5">
                <a href="{{ route('users.edit', Auth::user()->id) }}" class="mr-3 text-muted"><i class="far fa-edit text-muted"></i>Profile Setting</a>
                <a href="{{ route('logout') }}"onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="text-muted"><i class="fas fa-sign-out-alt text-muted"></i>Logout</a>
            </div>
        @endif
        </div>
        <div class="col-9  mt-4 mb-2 pb-3 bg-white">
            <div class="shadow my-4 px-2 py-3  bg-light">
                <h1 class='text-center'>My Posts</h1>
                <div class="mt-3 mb-5">
                    @if($posts->count() == 0)
                      <h4 class= "text-muted text-center my-5">No Posts</h4>
                    @else
                        @include('posts.posts', ['posts' => $posts])
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

        
