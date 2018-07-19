@extends('layouts.app')


@section('cover')
    <div class="jumbotron bg-dark">
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
            <a href="{{ route('posts.borrow', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-sad-tear"></i><br>Borrow</a>
          </li>
          <li class="nav-item col-4">
            <a href="{{ route('items.lend', ['id' => $group->id]) }}" class="nav-link active"><i class="fas fa-smile-wink"></i><br>Lend</a>
          </li>
       </ul>
    </div>


<div class= "container-fluid bg-light">
<div class= "row offset-1 col-10">
    

<div class=" col-7 mx-auto">
     {!! Form::model($item, array('route' => array('items.store', $group->id)))!!}
    <div class="row item">
             <div class="col-md-10 offset-1">
                <h2 class="text-center">Register Items</h2>
                
                <div class="form-group">
                    {!! Form::label('name', 'Item name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'Description') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '5']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('reward', 'Reward') !!}
                    {!! Form::text('reward', null, ['class' => 'form-control', 'placeholder' => 'ex: $100 or a cup of coffee']) !!}
                </div>
                <div class="form-group">
                     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Status</label>
                      <select name="status" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option value="open" selected>Open</option>
                            <!--<option value="closed">closed</option>-->
                      </select>
                </div>
               
              </div>
        
            {{ Form::hidden('group_id', $group->id)}}
            {!! Form::submit('upload', ['class' => 'btn btn-primary  btn-block col-6  mx-auto']) !!}
              
            {!! Form::close() !!}
            
        </div>
        </div>
        
        
        <div class="my-4 offset-1 col-4">
    <h2 class="text-center">Posted messages</h2>
    @include('posts.posts', ['posts' => $posts])
    @if (count($posts) >0)
        <a href="{{ route ('posts.index', ['id' => $group->id]) }}" class="float-right btn btn-outline-primary">More...</a>
    @endif
</div>
 
 
 </div>
 </div>
        

@endsection