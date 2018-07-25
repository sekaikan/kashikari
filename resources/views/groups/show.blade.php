@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="jumbotron-home col-6 offset-3 my-5 p-3">
        <h1 class="font-weight-normal text-light text-center">{{ $group->name }}</h1>
        <div class="col-4 offset-4 text-center">
            <?php
                $image_rand = array(
                            "images/image1.jpg",
                            "images/image2.jpg",
                            "images/image3.jpg", 
                            "images/image5.jpg",
                            "images/team1.jpg",
                            "images/team2.jpg",
                                    );
                $image_path = $image_rand[mt_rand(0, count($image_rand)-1)];
            ?>
            <img class="usershowicon" src="{{ secure_asset($image_path) }}">
        </div> 
        <?php $url = $_SERVER['REQUEST_URI'];?>
        <div class="offset-8">
        @if(strstr($url,'userlist'))
            @include('groups.delete_button')
        @endif
        </div>
        
        <div class="mb-4 mt-3 bg-light mx-5 pl-3 py-4">  
            <div class="row px-5">
                    <div class="col-8">
                    <?php $users = $group->users()->get(); ?>
                    <h2>Members <span class="badge badge-pill badge-warning">{{$users->count()}}</span></h2>
                    </div>
                    <div class="col-4 pl-5">
                    @include('group_user.follow_button', ['user' => $user])
                    </div>
                    @if($group->users()->get() != NULL)
                        <div class="row text-center mt-4 col-12">
                        @foreach($users as $user)

                            <div class="col-3 mt-1">
                                <a href="{{ route('users.show', $user->id) }}"><img class="usergroupicon shadow" src="{{ $user->photo }}"></a> 
                                <h5 class="mt-1"><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></h5>

                            </div>
                        @endforeach
                        </div>
                    @endif
            </div>
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
</div>


@endsection