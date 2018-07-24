@extends('layouts.app')

@section('content')
<div class="jumbotron-home text-center my-5 p-3">
    <div class="row mt-5">
        <div class="col-4 offset-4">
            <h1 class="font-weight-normal text-light">{{ $group->name }}</h1>
        <?php
                $image_rand = array(
                                    '/images/image1.jpg',
                                    '/images/image2.jpg',
                                    '/images/image3.jpg',
                                    '/images/home1.jpg'
                                    );
                $image_path = $image_rand[mt_rand(0, count($image_rand)-1)];
                ?>
                <img class="usershowicon" src="{{ secure_asset($image_path) }}">
        </div>
         <?php $url = $_SERVER['REQUEST_URI'];?>
        @if(strstr($url,'userlist'))
            <div  class="mr-5 col-2">
                {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                {!! Form::button('Delete <i class="fas fa-trash"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary btn-lg']) !!}
                {!! Form::close() !!}
            </div>
        @endif
    </div>
    <div class="row fixed-bottom justify-content-end">
        <div class="col-1 mr-4 mb-3">
            <div class="icon container">
                @if(strstr($url,'group') && (Auth::user()->is_following($group->id)))
                <a href= "{{ route ('chats.index', ['id' => $group->id]) }}">
                    <span class="fa-stack">
                    <i class="far fa-circle fa-stack-2x"></i>
                    <i class="far fa-comments fa-stack-1x faa-wrench animated-hover"></i>
                    </span>
                </a>
                @endif
           </div>
        </div>
    </div>
</div>


<div class="container ">
    <div class="col-8 mx-auto">    
            <div class="float-right">
                @include('group_user.follow_button', ['user' => $user])
            </div>
            <div class="">
            <h2>Members</h2>
                @if($group->users()->get() != NULL)
                    <?php $users = $group->users()->get(); ?>
                    @foreach($users as $user)
                    <h5><a href="{{ route('users.show', $user->id) }}" class="">{{ $user->name }}</a></h5>
                    @endforeach
                @endif
            </div>
    </div>
</div>
@endsection