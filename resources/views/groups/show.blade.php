@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="card col-8 mt-5 mx-auto">
            <h1 class="card-header text-center">{!! $group->name !!}</h1>
            <?php
                $image_rand = array(
                                    '/images/image1.jpg',
                                    '/images/image2.jpg',
                                    '/images/image3.jpg',
                                    '/images/home1.jpg'
                                    );
                $image_path = $image_rand[mt_rand(0, count($image_rand)-1)];
                ?>
                <img class="card-img-top" src="{{ secure_asset($image_path) }}">

                <div class="card-body">
                    <div class="card-title float-right">
                        @include('group_user.follow_button', ['user' => $user])
                    </div>
                    <h3 class="card-title">Members</h3>
                    @if($group->users() != NULL)
                        @if (count($group->users()) > 0)
                        <?php $users = $group->users()->get(); ?>
                        @foreach($users as $user)
                        <h6><a href="{{ route('users.show', $user->id) }}" class="card-link">{{ $user->name }}</a></h6>
                        @endforeach
                        @endif
                    @endif
                </div>
        </div>
    </div>
</div>
@endsection