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
                            
                            <img class="usericon" src="{{  secure_asset($image_rand[$key % 5]) }}">
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
            <li class="nav-item active col-4 px-0">
                <a href="{{ route('posts.borrow', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-hand-holding-heart"></i><br>Borrow</a>
            </li>
            <li class="nav-item col-4 px-0">
                <a href="{{ route('items.lend', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-people-carry"></i><br>Lend</a>
            </li>
        </ul>
    </div>
    <div class="bg-white py-5" id="form-bg" style= margin-top:0;>
        <div class="container">
            <div class="row">
                <div class= "offset-3 col-6">
                     @if (Auth::id() == $user->id)
            {!! Form::open(array('route' => array('posts.store', $group->id))) !!}
                <div class="form-group" id="review-form-group">
                    {{ Form::hidden('group_id', $group->id)}}
                    {!! Form::textarea('content', '', ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'What do you need ?', 'rows'=>'3']) !!}
    
                    {!! Form::submit('submit', ['class' => 'btn btn-blue btn-block', 'id' => 'form-button']) !!}
                </div>
                {!! Form::close() !!}
            @endif
                    
                
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <h2 class="text-center">Shared Items</h2>
        <div class ="row offset-2 col-8">
            @include('items.items', ['items' => $items])
        </div>
        @if (count($items) >0)    
            <a href="{{ route ('items.index', ['id' => $group->id]) }}" class="offset-6"><i class="fas fa-2x fa-fw fa-chevron-circle-down my-3"></i><span class="h6">Item List</span></a>
        @endif
    </div>
</div>
@endsection