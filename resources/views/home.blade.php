@extends('layouts.app')


      
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
         @include('notifications.notifications')
         </div>
        <div class="col-9">
            <div class="mt-4">
                <h2>My Groups</h2>
                <div class="row">
                @foreach ($follow_groups as $group)
                    <div class="card col-4">
                      <div class="card-header"> 
                      {!! link_to_route('group.show',  $group->name , ['id' => $group->id]) !!}
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
                       {!! link_to_route('group.show',  'Go!' , ['id' => $group->id],['class'=>'btn btn-outline-danger']) !!}
           
                {{--  <div class="card-body">
                           @include('group_user.follow_button', ['user' => $user])
                           {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                          {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-warning btn-lg']) !!}
                          {!! Form::close() !!}
                        </div> --}}
                    </div>   
                @endforeach
                </div>
            </div>

    
            <div class="mt-4">
                <h2>Others</h2>
                <div class="row">
                    @foreach ($unfollow_groups as $group)
                        <div class="card col-4">
                            <div class="card-header"> 
                            {!! link_to_route('group.show',  $group->name , ['id' => $group->id]) !!}
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
           
           
                   {{-- <div class="card-body">

                           @include('group_user.follow_button', ['user' => $user])
                           {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                          {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-warning btn-lg']) !!}
            
                          {!! Form::close() !!}
                            </div> --}}
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
    
    
    
     <div class="col-3 mt-5 ">
<div class="card" style="width: 18rem;">
  <div class="text-center card-title mt-3">
    <h3>Create Group</h3>
  </div>
  <div class="card-body">
      {!! Form::model($groups, ['route' => 'group.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', '', ['class' => 'form-control', 'placeholder'=>'Group Name']) !!}
                </div>
            {!! Form::submit('Create', ['class' => 'btn btn-outline-success']) !!}
            {!! Form::close() !!}
    </div>  
      
      
   <h3 class="text-center card-title">
       Search Group
   </h3>
    <div class="card-body">
        <form class="form-inline" action="{{url('/results/')}}">
         <div class="form-group mr-2">
         <input type="text" name="keyword" value="" class="form-control" placeholder="Find Groups">
         </div>
         <input type="submit" value="Search" class="btn btn-outline-success">
         </form>
  </div>
</div>            
        </div> 
  </div>
</div>


@endsection
