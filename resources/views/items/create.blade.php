@extends('layouts.app')


@section('cover')
     <div class="jumbotron jumbotron-home">
            <h1 class="text-center text-white mt-5">{!! $group->name !!}</h1>
            
            <div class="col-3 mx-auto">
                <div class="mx-auto">
                    @if (isset($groupusers))
                        @foreach($groupusers as $key => $groupuser)
                        <?php 
                            $image_rand = array(
                                    "images/user6.jpg",
                                    "images/user2.jpg",
                                    "images/user3.jpg", 
                                    "images/user4.jpg", 
                                    "images/user5.jpg"
                                );
                        ?>
                        
                        <img class="usericon" src="{{  secure_asset($image_rand[$key]) }}">
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
            <a href="{{ route('posts.borrow', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-sad-tear"></i><br>Borrow</a>
          </li>

          <li class="nav-item active col-4 px-0">
            <a href="{{ route('items.lend', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-smile-wink"></i><br>Lend</a>
          </li>
       </ul>
    </div>


<div class= "container bg-light">
<div class= "row offset-1 col-10">
    

<div class="col-7 mx-auto">
     {!! Form::model($item, array('route' => array('items.store', $group->id)))!!}
    <div class="row item">
             <div class="">
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
                {{ Form::hidden('group_id', $group->id)}}
            {!! Form::submit('upload', ['class' => 'btn btn-primary btn-block mt-2']) !!}
              
            {!! Form::close() !!}
          </div>        
        </div>
    </div>
        
        
        <div class="col-5 mx-auto">
    <div class="row item">
    <div class="">
    <h2 class="text-center">Posted messages</h2>
    @include('posts.posts', ['posts' => $posts])
    @if (count($posts) >0)
        <a href="{{ route ('posts.index', ['id' => $group->id]) }}" class="btn btn-outline-primary btn-block mt-2">More...</a>
    @endif
</div>
</div>
</div>

 
 
 </div>
 </div>
        
</div>
@endsection