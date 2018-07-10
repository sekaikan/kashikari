@extends('layouts.app')

@section('cover')
    <div class="jumbotron jumbotron-fluid bg-dark">
            <h1 class="text-center text-white">{!! $group->name !!}</h1>
    </div>
@endsection

@section('content')

<div class="mainmenu">
    <div class="row text-center my-5">
      <div class="col-3"><a href="/items/create"><i class="fas fa-smile-wink"></i></a><br><span class="icontitle">Lend</span>
      </div>
      <div class="col-3"><a href="/posts/create"><i class="fas fa-sad-tear"></i></a><br><span class="icontitle">Borrow</span>
      </div>
      <div class="col-3"><a href="/chats"><i class="fas fa-comments"></i></a><br><span class="icontitle">Chat</span>
      </div>
      <div class="col-3"><a href="{{ route('users.show', Auth::user()->id) }}"><i class="fas fa-user-circle"></i></a><br><span class="icontitle">My Page</span>
      </div>
    </div>
</div>
<div class="my-3">
    <h2 class="text-center">Share Your Items</h2>
    @include('items.items', ['items' => $items])
    @if (count($items) >0)    
        <a href="{{ route ('items.index') }}" class="">More...</a>
    @endif
</div>

<div class="my-3">
    <h2 class="text-center">Ask for what you need</h2>
    @include('posts.posts', ['posts' => $posts])
    @if (count($posts) >0)
        <a href="{{ route ('posts.index') }}" class="">More...</a>
    @endif
</div>

@endsection