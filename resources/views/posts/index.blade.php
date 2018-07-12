@extends('layouts.app')

@section('cover')
    <div class="jumbotron jumbotron-fluid bg-dark">
            <h1 class="text-center text-white mt-5">{!! $group->name !!}</h1>
    </div>
@endsection

@section('content')



     <div class="mainmenu status text-center">
       <ul class="nav nav-tabs justify-content-center">
          <li class="nav-item col-3">
            <a class="nav-link" href="/group/{{$group->id}}"><i class="fas fa-home"></i><br>Home</a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" href="/posts/create"><i class="fas fa-sad-tear"></i><br>Borrow</a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" href="/items/create"><i class="fas fa-smile-wink"></i><br>Lend</a>
          </li>
       </ul>
    </div>
   

    @include('posts.posts')
    <a href="/group" class="">back >></a>
@endsection

{!!$posts->render() !!}