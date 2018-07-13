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
            <a class="nav-link active" href="/posts/create"><i class="fas fa-sad-tear"></i><br>Borrow</a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" href="/items/create"><i class="fas fa-smile-wink"></i><br>Lend</a>
          </li>
       </ul>
    </div>
    
<div class="bg-white py-5" id="form-bg" style= margin-top:0;>
    <div class="container">
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
</div>

  <div class="container my-3">
    <h2 class="text-center">Shared Items</h2>
    @include('items.items', ['items' => $items])
    @if (count($items) >0)    
        <a href="{{ route ('items.index') }}" class="float-right btn btn-outline-primary">More...</a>
    @endif
</div>
</div>
@endsection