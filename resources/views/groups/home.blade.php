@extends('layouts.app')

@section('cover')
    <div class="jumbotron jumbotron-fluid bg-dark">
            <h1 class="text-center text-white mt-5">{!! $group->name !!}</h1>
    </div>
@endsection

@section('content')
      <div class="container">
          @include('notifications.notifications')
      </div>
     <div class="mainmenu status text-center">
       <ul class="nav nav-tabs justify-content-center">
          <li class="nav-item col-3">
            <a class="nav-link active" href="/group/{{$group->id}}"><i class="fas fa-home"></i><br>Home</a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" href="/posts/create"><i class="fas fa-sad-tear"></i><br>Borrow</a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" href="/items/create"><i class="fas fa-smile-wink"></i><br>Lend</a>
          </li>
       </ul>
    </div>
   
    

<div class="row">
<div class="container my-3 col-7">
    <h2 class="text-center">Share Your Items</h2>
    @include('items.items', ['items' => $items])
    @if (count($items) >0)    
        <a href="{{ route ('items.index') }}" class="btn btn-link">More...</a>
    @endif
</div>

<div class="container my-3 col-4">
    <h2 class="text-center">Ask for what you need</h2>
    @include('posts.posts', ['posts' => $posts])
    @if (count($posts) >0)
        <a href="{{ route ('posts.index') }}" class="">More...</a>
    @endif
</div>
</div>

@endsection