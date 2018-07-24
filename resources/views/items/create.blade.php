@extends('layouts.app')


@section('cover')
     <div class="jumbotron jumbotron-home">
            <h1 class="text-center text-white mt-5">{!! $group->name !!}</h1>
            
            <div class="col-3 mx-auto">
                <div class="mx-auto">
                    @if (isset($groupusers))
                        @foreach($groupusers as $key => $groupuser)
                            <img class="usericon" src="{{ $groupuser->photo }}">
                        @endforeach
                    @endif
                    <a href="{{route('group.userlist', ['id' => $group->id]) }}" class="lasticon"><i class="fas fa-ellipsis-h text-light"></i></a> 
                </div>
            </div>
            
    </div>
@endsection



@section('content')
<div class="container">
  <div class="mainmenu sen status text-center">

       <ul class="nav nav-tabs justify-content-center">
          <li class="nav-item col-4 px-0">
            <a class="nav-link" href="/group/{{$group->id}}"><i class="fas fa-home"></i><br>Home</a>
          </li>
          <li class="nav-item col-4 px-0">
            <a href="{{ route('posts.borrow', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-hand-holding-heart"></i><br>Borrow</a>
          </li>

          <li class="nav-item active col-4 px-0">
            <a href="{{ route('items.lend', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-people-carry"></i><br>Lend</a>
          </li>
       </ul>
    </div>


<div class= "container bg-light">
<div class= "row offset-1 col-10">
    

<div class="col-7 mx-auto">
     {!! Form::model($item, array('route' => array('items.store', $group->id)))!!}
    <div class="row item">
             <div class="">
                <h2 class="text-center under">Register Items</h2>
                
                <div class="form-group">
                    {!! Form::label('name', 'Item name (*Required)') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'Description (*Required)') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '5','placeholder' => 'ex: This is my Camera']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('reward', 'Reward') !!}
                    {!! Form::text('reward', null, ['class' => 'form-control', 'placeholder' => 'ex: $100 or a cup of coffee']) !!}
                </div>
                {{ Form::hidden('group_id', $group->id)}}

            {!! Form::submit('upload', ['class' => 'btn btn-blue  btn-block  mx-auto my-3']) !!}
            {!! Form::close() !!}
          </div>        
        </div>
    </div>
        <div class="col-5 mx-auto">
    <div class="row item">
    <div class="">
    <h2 class="text-center under">Posted messages</h2>
    @if($posts->count() == 0)
          <h4 class= "text-muted text-center mt-4">No Posts</h4>
    @else
    @include('posts.posts', ['posts' => $posts])
    @endif
    
    @if ($posts->count() >0)

        <a href="{{ route ('posts.index', ['id' => $group->id]) }}" class="float-right"><i class="fas fa-2x fa-fw fa-chevron-circle-down my-3"></i><span class="h6">More...</span></a>
    @endif
</div>
</div>
</div>

 
 
 </div>
 </div>
        
</div>
@endsection