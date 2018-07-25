@extends('layouts.app')


      
@section('content')
    <?php 
        $datetime1 = new DateTime(\Auth::user()->created_at);
        $datetime1 = $datetime1->getTimestamp();
        $datetime2 = new DateTime(date('Y-m-d H:i:s'));
        $datetime2 = $datetime2->getTimestamp();
        $interval = $datetime2 - $datetime1;
        $is_new = $interval < 20;
    ?>
    @if($is_new)
    <style type="text/css">
        #busy {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0px;
            top:0px;
            background-color: black;
            opacity: 0.5;
            visibility: visible;
            z-index: 1040;
        }
    </style>
    @endif
<div class="container mt-5">
    <div class="row">
        <div class="col-3 mt-4 mb-2 jumbotron-home text-white">
            <div class="text-center mt-4">
                <img class="usershowicon" src="{{ $user->photo }}"> 
                <h2>{!! $user->name !!}</h2>
            </div>
            <div class=" px-3 py-2 mt-4">
                <h5 class="card-title text-center">Search Group</h5>
                {!! Form::open(array('method' => 'Get', 'route' => 'groups.search')) !!}
                <div class="form-group text-right">
                    @if($is_new)
                        {!! Form::text('keyword', null, ['class' => 'form-control tutorial', 'placeholder'=>'Find Groups', 'data-container'=>'body','data-toggle'=>'popover','data-placement'=>'bottom','data-content'=>'<strong>Search for groups you want to join.</strong>']) !!}
                    @else
                        {!! Form::text('keyword', null, ['class' => 'form-control', 'placeholder'=>'Find Groups']) !!}
                    @endif
                    {!! Form::submit('Search', ['class' => 'btn btn-blue mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class=" px-2 py-2 mt-3">
                <h5 class="card-title text-center">Create Group</h5>
                {!! Form::model($groups, ['route' => 'group.store']) !!}
                <div class="form-group text-right">
                    @if($is_new)
                        {!! Form::text('name', '', ['class' => 'form-control tutorial', 'placeholder'=>'Group Name', 'data-container'=>'body','data-toggle'=>'popover','data-placement'=>'bottom','data-content'=>'<strong>Or you can create one!</strong>']) !!}
                    @else
                        {!! Form::text('name', '', ['class' => 'form-control', 'placeholder'=>'Group Name']) !!}
                    @endif
                    {!! Form::submit('Create', ['class' => 'btn btn-blue mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-9  mt-4 mb-2 pb-3 bg-white">
            @if($is_new)
            <div class="mt-3 text-dark tutorial" data-container="body" data-toggle="popover" data-placement="left" data-content="<strong>You can check your requests, replies, and comments.</strong>">
            @else
            <div class="mt-3 text-dark">
            @endif
            @include('notifications.notifications')
            </div>
            @if($is_new)
            <div class="fixed-bottom text-right m-5" style="z-index: 1050;">
                <a class="btn btn-orange btn-lg tutorial-close text-light shadow-lg"><i class="fas fa-times mr-2"></i>End Tutorial</a></span>
            </div>
            @endif
            <div class="shadow mt-3 px-2 py-2 bg-light">
                <h2 class="text-center">My Groups</h2>
                <div class="row"> 
                @if ($follow_groups->count() != 0)
                    @foreach ($follow_groups as $group)
                    <div class="col-4 mt-2">
                        <div class="card bg-dark text-white">
                            <?php $image_rand = array(
                                "images/image1.jpg",
                                "images/image2.jpg",
                                "images/image3.jpg", 
                                "images/image5.jpg",
                                "images/team1.jpg",
                                "images/team2.jpg",
                              );
                            $image_rand = $image_rand[mt_rand(0, count($image_rand)-1)];
                            ?>
                            <img class="card-img card-img-home" src="{{ $image_rand }}">
                            <div class="card-img-overlay group-name"> 
                                {!! $group->name !!}
                                <p></p>
                                {!! link_to_route('group.show',  'Go!' , ['id' => $group->id],['class'=>'btn btn-orange btn-block']) !!}
                            </div>
                        </div>
                    </div>   
                    @endforeach
                @else
                     <div class="col-4 mt-2">
                            <div class="card bg-dark text-white">
                                 <?php $image_rand = array(
                                    "images/image1.jpg",
                                    "images/image2.jpg",
                                    "images/image3.jpg", 
                                    "images/image5.jpg",
                                    "images/team1.jpg",
                                    "images/team2.jpg",
                                  );
                                  $image_rand = $image_rand[mt_rand(0, count($image_rand)-1)];
                                  ?>
                                  
                                <img class="card-img-top card-img-home" src="{{ $image_rand }}">
                                @if($is_new)
                                <div class="card-img-overlay group-name tutorial" data-container="body" data-toggle="popover" data-placement="right" data-content="<strong>Here are your groups.</strong>">
                                @else
                                <div class="card-img-overlay group-name">
                                @endif
                                    {!! $newgrad->name !!}
                                    <p></p>
                                     {!! link_to_route('group.show',  'Details' , ['id' => $newgrad->id],['class'=>'btn btn-blue  btn-block']) !!}
                                </div>
                            </div>
                        </div>   
                    <a href="group/create" class="col-4 my-4  text-center">
                        <i class="fas fa-plus fa-9x" style="color: #c0c0c0;"></i>
                    </a>
                @endif
                </div>
            </div>
            <div class="shadow mt-3 py-2 px-2 bg-light">
                <h2 class="text-center">Other Groups</h2>
                <div class="row">
                @if($unfollow_groups->count() != 0)
                    @foreach ($unfollow_groups as $group)
                    <div class="col-4 mt-2">
                        <div class="card bg-dark text-white">
                             <?php $image_rand = array(
                                "images/image1.jpg",
                                "images/image2.jpg",
                                "images/image3.jpg", 
                                "images/image5.jpg", 
                                "images/team1.jpg",
                                "images/team2.jpg",
                              );
                              $image_rand = $image_rand[mt_rand(0, count($image_rand)-1)];
                              ?>
                              
                            <img class="card-img-top card-img-home" src="{{ $image_rand }}">
                            <div class="card-img-overlay group-name"> 
                                {!! $group->name !!}
                                <p></p>
                                 {!! link_to_route('group.show',  'Details' , ['id' => $group->id],['class'=>'btn btn-blue  btn-block']) !!}
                            </div>
                        </div>
                    </div>  
                    @endforeach
                @else
                     <div class="col-4 mt-2">
                        <div class="card">
                            <img class="card-img-top" src="images/white.jpg">
                            <div class="card-img-overlay group-name"> 
                                No other groups<br>
                                Please Create <i class="far fa-smile"></i>
                            </div>
                        </div>
                    </div>  
                    <a href="group/create" class="col-4 my-4  text-center">
                        <i class="fas fa-plus fa-9x" style="color: #c0c0c0;"></i>
                    </a>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

