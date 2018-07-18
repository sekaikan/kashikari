@extends('layouts.app')

@section('cover')
    <div class="jumbotron jumbotron-fluid bg-dark">
            <h1 class="text-center text-white mt-5">{!! $group->name !!}</h1>
    </div>
@endsection

@section('content')
     <div class="mainmenu status text-center">
       <ul class="nav nav-tabs justify-content-center">
          <li class="nav-item col-4">
            <a class="nav-link" href="/group/{{$group->id}}"><i class="fas fa-home"></i><br>Home</a>
          </li>
          <li class="nav-item col-4">
            <a class="nav-link" href="/posts/create"><i class="fas fa-sad-tear"></i><br>Borrow</a>
          </li>
          <li class="nav-item col-4">
            <a class="nav-link" href="/items/create"><i class="fas fa-smile-wink"></i><br>Lend</a>
          </li>
       </ul>
    </div>
   
   <div class="container-fluid pt-5 bg-light">
         <div class= "offset-2 col-8">
        @if (Auth::id() == $user->id)
        {!! Form::open(['route' => 'posts.store']) !!}
            <div class="form-group" id="review-form-group">
                {{ Form::select('status', array('open' => 'Open', 'closed' => 'Solved'), 'open', ['class'=>'form-control']) }}
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'Please borrow!!', 'rows'=>'3']) !!}
                {!! Form::submit('submit', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
            </div>
            {!! Form::close() !!}
        @endif
    </div>
    <div class="container">
      @include('posts.posts')
    </div>
    <!--<a href="/group" class="">back >></a>-->
    </div>
    </div>
@endsection

{!!$posts->render() !!}