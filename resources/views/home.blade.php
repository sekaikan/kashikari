@extends('layouts.app')


      
@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-12 mt-5">
             @include('notifications.notifications')
        </div>

        
        <div class="col-9 my-2">
            <h2 class="mt-3">My Groups</h2>
            <div class="row">
            @if (count($follow_groups) > 0)
                @foreach ($follow_groups as $group)
                <div class="col-4 mt-3">
                    <div class="card bg-dark text-white">
                        <?php $image_rand = array(
                            "images/image1.jpg",
                            "images/image2.jpg",
                            "images/image3.jpg", 
                            "images/home1.jpg", 
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
                 <div class="col-4">
                        <div class="card bg-dark text-white">
                             <?php $image_rand = array(
                                "images/image1.jpg",
                                "images/image2.jpg",
                                "images/image3.jpg", 
                                "images/home1.jpg", 
                              );
                              $image_rand = $image_rand[mt_rand(0, count($image_rand)-1)];
                              ?>
                              
                            <img class="card-img-top card-img-home" src="{{ $image_rand }}">
                            <div class="card-img-overlay group-name"> 
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
                <h2 class="mt-3">Other Groups</h2>
                <div class="row">
                    @foreach ($unfollow_groups as $group)
                    <div class="col-4 mt-3">
                        <div class="card bg-dark text-white">
                             <?php $image_rand = array(
                                "images/image1.jpg",
                                "images/image2.jpg",
                                "images/image3.jpg", 
                                "images/home1.jpg", 
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
                </div>
            </div>
       
        <div class="col-3 mt-4">
            <div class="bg-light px-2 py-2 mt-4">
                <h4 class="card-title text-center">Search Group</h4>
                <form class="form-inline" action="{{url('/results/groupsearch/')}}">
                    <input type="text" name="keyword" value='' class="form-control" placeholder="Find Groups">
                    <i class=" ml-2 fas fa-search"></i>
                </form>
            </div>
            
            {{--<div class="bg-light px-1 py-1  mt-3">
             @include('notifications.notification2')
            </div>--}}

            <div class="bg-light px-2 py-2 mt-4">
                <h4 class="card-title text-center">Create Group</h4>
                  {!! Form::model($groups, ['route' => 'group.store']) !!}
                    <div class="form-group text-right">
                        {!! Form::text('name', '', ['class' => 'form-control', 'placeholder'=>'Group Name']) !!}
                        {!! Form::submit('Create', ['class' => 'btn btn-blue']) !!}
                        {!! Form::close() !!}
                    </div>
            </div>
            
        </div>
      </div>
</div>


@endsection

