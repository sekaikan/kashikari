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
            <li class="nav-item col-3 px-0">
                <a href="{{ route('posts.borrow', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-hand-holding-heart"></i><br>Borrow</a>
            </li>
            <li class="nav-item col-3 px-0">
                <a href="{{ route('items.lend', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-people-carry"></i><br>Lend</a>
            </li>
            <li class="nav-item col-3 px-0 active">
                <a href="{{ route('chats.index', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-comments"></i><br>Chats</a>
            </li>
        </ul>
    </div>
    <div class="container bg-light pt-5 px-5">
        <h2 class="text-center under mx-5">Group Chat</h2>
        {!! Form::open(array('route' => array('chats.store', $group->id),'class'=>'col-lg-4 col-6 mx-auto')) !!}
            <div class="row mt-5">
            {{ Form::hidden('group_id', $group->id)}}
            {!! Form::text('content', NULL, ['class' => 'form-control col-10', 'id' => 'bms_send_message', 'placeholder' => 'What\'s up?']) !!}
            {{ Form::submit('&#xf1d8;', ['class' => 'btn far col-2','id'=>'bms_send_btn']) }}
            </div>
        {!! Form::close() !!}
        @if (count($chats) >0)
            @include('chats.chats')
        @endif
    </div>
</div>
@endsection