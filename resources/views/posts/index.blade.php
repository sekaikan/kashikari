@extends('layouts.app')

@section('cover')
    <div class="jumbotron  bg-dark">
            <h1 class="text-center text-white mt-5">{!! $group->name !!}</h1>
    </div>
@endsection

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-12 my-3">
         @include('notifications.notifications')
        </div>
    </div>
    </div>
<div class="container mainmenu status text-center">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item col-4">
                <a class="nav-link" href="/group/{{$group->id}}"><i class="fas fa-home"></i><br>Home</a>
                </li>
    
                <li class="nav-item active col-4">
                <a href="{{ route('posts.borrow', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-sad-tear"></i><br>Borrow</a>
                </li>
    
                <li class="nav-item col-4">
                <a href="{{ route('items.lend', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-smile-wink"></i><br>Lend</a>
                </li>
            </ul>
        </div>
   
   
   <div class="container pt-5 bg-light">
         <div class= "offset-2 col-8">
        @if (Auth::id() == $user->id)
        {!! Form::open(array('route' => array('posts.store', $group->id))) !!}
            <div class="form-group" id="review-form-group">
                {{ Form::select('status', array('open' => 'Open', 'closed' => 'Solved'), 'open', ['class'=>'form-control']) }}
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'What do you need ?', 'rows'=>'3']) !!}
                {{ Form::hidden('group_id', $group->id)}}
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