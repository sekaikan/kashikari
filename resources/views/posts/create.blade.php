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
    <div class="mainmenu sen status text-center mt-2">
       <ul class="nav nav-tabs justify-content-center">
          <li class="nav-item col-3 px-0">
            <a class="nav-link" href="/group/{{$group->id}}"><i class="fas fa-home"></i><br>Home</a>
          </li>
          <li class="nav-item col-3 px-0 active">
            <a href="{{ route('posts.borrow', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-hand-holding-heart"></i><br>Borrow</a>
          </li>
          <li class="nav-item col-3 px-0">
            <a href="{{ route('items.lend', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-people-carry"></i><br>Lend</a>
          </li>
          <li class="nav-item col-3 px-0">
            <a href="{{ route('chats.index', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-comments"></i><br>Chats</a>
          </li>
       </ul>
    </div>
    <div class="bg-light py-5" id="form-bg" style= margin-top:0;>
        <div class="container">
            <div class="row">
                <div class= "mx-auto col-lg-6 col-8 ">
                     @if (Auth::id() == $user->id)
            {!! Form::open(array('route' => array('posts.store', $group->id),'id' => 'content-content')) !!}
                <div class="form-group" id="review-form-group">
                    {{ Form::hidden('group_id', $group->id)}}
                       <select name="status" class="custom-select" id="inlineFormCustomSelectPref">
                             <option value="Emergency" selected>Emergency</option>
                             <option value="Not Emergency">Not Emergency</option>
                       </select>
                    {!! Form::textarea('content', '', ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'What do you need?', 'rows'=>'3']) !!}
    
                    {!! Form::submit('submit', ['class' => 'btn btn-blue btn-block', 'id' => 'form-button']) !!}
                </div>
                {!! Form::close() !!}
            @endif
                    
                
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <h2 class="text-center offset-1 col-10 under">Shared Items</h2>
        @if($items->count() == 0)
          <h4 class= "text-muted text-center mt-4">No Items</h4>
        @else
        <div class ="row offset-2 col-8">
            @include('items.items', ['items' => $items])
        </div>
        @endif
        
        @if ($items->count() >0)    
            <a href="{{ route ('items.index', ['id' => $group->id]) }}" class="offset-5"><i class="fas fa-2x fa-fw fa-chevron-circle-down my-3 ml-4"></i><span class="h6">More...</span></a>
        @endif
    </div>
</div>
@endsection