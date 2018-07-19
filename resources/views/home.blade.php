@extends('layouts.app')


      
@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-12 mt-5">
         @include('notifications.notifications')
        </div>
        
        <div class="col-9 mt-4">
            <h2 class="text-center my-3">My Groups</h2>
            <div class="row">
            @if (count($follow_groups) > 0)
                @foreach ($follow_groups as $group)
                <div class="col-4">
                    <div class="card">
                        <div class="card-header"> 
                            {!! $group->name !!}
                        </div>
                        <?php $image_rand = array(
                            "images/image1.jpg",
                            "images/image2.jpg",
                            "images/image3.jpg", 
                            "images/home1.jpg", 
                          );
                        $image_rand = $image_rand[mt_rand(0, count($image_rand)-1)];
                        ?>
                        <img class="card-img-top" src="{{ $image_rand }}">
                        <div class="card-body">
                            {!! link_to_route('group.show',  'Go!' , ['id' => $group->id],['class'=>'btn btn-success btn-block']) !!}
                        </div>
                    </div>
                </div>   
                @endforeach
            @else
                <a href="group/create" class="my-5 ml-5 text-left">
                    <i class="far fa-plus-square fa-9x text-left text-muted"></i>
                </a>
            @endif
            </div>
                <h2 class="othergroups text-center my-3">Other Groups</h2>
                <p class="fukidashi"> You can join these groups!!</p>
                <div class="row">
                    @foreach ($unfollow_groups as $group)
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header"> 
                                {!! $group->name !!}
                            </div>
          
                              <?php $image_rand = array(
                                "images/image1.jpg",
                                "images/image2.jpg",
                                "images/image3.jpg", 
                                "images/home1.jpg", 
                              );
                              $image_rand = $image_rand[mt_rand(0, count($image_rand)-1)];
                              ?>
                              
                            <img class="card-img-top" src="{{ $image_rand }}">
                            <div class="card-body"> 
                                {!! link_to_route('group.show',  'Details' , ['id' => $group->id],['class'=>'btn btn-success  btn-block']) !!}
                            </div>
                        </div>
                    </div>   
                    @endforeach
                </div>
            </div>
       
        <div class="col-3 mt-5">
            <div class="bg-light px-1 py-1 mt-3">
                <h4 class="card-title text-center">Search Group</h4>
                <form class="form-inline" action="{{url('/results/groupsearch/')}}">
                    <input type="text" name="keyword" value='' class="form-control" placeholder="Find Groups">
                    <i class=" ml-2 fas fa-search"></i>
                </form>
            </div>

            <div class="bg-light px-1 py-1 mt-5">
                <h4 class="card-title text-center">Create Group</h4>
                  {!! Form::model($groups, ['route' => 'group.store']) !!}
                    <div class="form-group">
                        {!! Form::text('name', '', ['class' => 'form-control', 'placeholder'=>'Group Name']) !!}
                        {!! Form::submit('Create', ['class' => 'btn btn-outline-success']) !!}
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
      </div>
</div>


@endsection

