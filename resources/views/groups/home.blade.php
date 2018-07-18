@extends('layouts.app')

@section('cover')
    <div class="jumbotron jumbotron-fluid bg-dark">
            <h1 class="text-center text-white mt-5">{!! $group->name !!}</h1>
            <div class="float-right mr-5">
                @include('group_user.follow_button', ['user' => $user])
            </div>
            
    </div>
@endsection

@section('content')
      <div class="container my-3">
          @include('notifications.notifications')
      </div>
     <div class="mainmenu status text-center">
       <ul class="nav nav-tabs justify-content-center">
          <li class="nav-item col-4">
            <a class="nav-link active" href="/group/{{$group->id}}"><i class="fas fa-home"></i><br>Home</a>
          </li>

           <li class="nav-item col-4">
            <a href="{{ route('posts.borrow', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-sad-tear"></i><br>Borrow</a>
          </li>

          <li class="nav-item col-3">
            <a href="{{ route('items.lend', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-smile-wink"></i><br>Lend</a>

          </li>
       </ul>
    </div>
   
    <div class="container-fluid pt-5 bg-light">
        <div class="row">
            <div class="col-7 ml-5">
        
            <h2 class="text-center">Shared Items</h2>
            @include('items.items', ['items' => $items])
            @if (count($items) >0)    
                <a href="{{ route ('items.index') }}" class="offset-3 col-6 btn btn-outline-primary mt-3">Item List</a>
            @endif
            </div>
            <div class="col-4 ml-5">
                <h2 class="text-center">Ask for what you need</h2>
                @include('posts.posts', ['posts' => $posts])
                @if (count($posts) >0)
                    <a href="{{ route ('posts.index') }}" class="float-right btn btn-outline-primary">More...</a>
                @endif
            </div>
        </div>
    </div>
    <div class="row fixed-bottom justify-content-end">
        <div class="col-1">
            <a href= "{{ route ('chats.index') }}">
                <img src ="/images/chat.png" class="rounded-circle img-fluid  fa-spin">
            </a>
        </div>
    </div>
  
   
 
@endsection