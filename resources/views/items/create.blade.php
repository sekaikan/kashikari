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
            <a class="nav-link active" href="/items/create"><i class="fas fa-smile-wink"></i><br>Lend</a>
          </li>
       </ul>
    </div>




<div class="container">
     {!! Form::model($item, ['route' => 'items.store']) !!}
        <div class="row item">
             <div class="col-md-6 offset-md-3">
                <h1 class="text-center font-weight-light">Register Items</h1>
                <div class="text-center">
                <img src="{{ $item->photo }}" class="">
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Item name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'Explanation') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('reward', 'Return') !!}
                    {!! Form::text('reward', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Status</label>
                      <select name="status" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option value="open" selected>Open</option>
                            <option value="closed">closed</option>
                      </select>
                </div>
               
              </div>
            {!! Form::submit('upload', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
              
            {!! Form::close() !!}
            
        </div>
        
    <div class="container my-3">
    <h2 class="text-center">Posted messages</h2>
    @include('posts.posts', ['posts' => $posts])
    @if (count($posts) >0)
        <a href="{{ route ('posts.index') }}" class="">More...</a>
    @endif
</div>

@endsection