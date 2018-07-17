@extends('layouts.app')


      
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 pt-5 mt-5">
         @include('notifications.notifications')
         </div>
        <div class="col-9 mt-4" style="background-color:white; width:100%;">
            <div class="mt-2">
                <h2 class="text-center">My Groups</h2>
                <div class="row">
                @if (count($follow_groups) > 0)
                
                    @foreach ($follow_groups as $group)
                        <div class="card col-4 mt-4">
                          <div class="card-header text-center"> 
                          <h4>{!! $group->name !!}</h4>
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
                           {!! link_to_route('group.show',  'Go!' , ['id' => $group->id],['class'=>'btn btn-outline-success']) !!}
               
                    {{--  <div class="card-body">
                               @include('group_user.follow_button', ['user' => $user])
                               {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                              {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-warning btn-lg']) !!}
                              {!! Form::close() !!}
                            </div> --}}
                        </div>   
                    @endforeach
                @else
                    <div class="my-5 ml-5 text-left">
                         <a href="{{url('/group/create')}}">
        
                        <i class="far fa-plus-square fa-9x text-left text-muted"></i></a>
                    </div>
                @endif
                </div>
            </div>

    
            <div class="mt-4">
                <h2 class="text-center">Others</h2>
                <div class="row">
                    @foreach ($unfollow_groups as $group)
                        <div class="card col-4 mt-4">
                            <div class="card-header text-center"> 
                            <h4>{!! $group->name !!}</h4>
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
                            {!! link_to_route('group.show',  'Details' , ['id' => $group->id],['class'=>'btn btn-outline-success']) !!}
           
           
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
    
    
    
     <div class="col-3 mt-4 ">
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
        <form class="form-inline" action="{{url('/results/groupsearch/')}}">
         <div class="form-group mr-2">
         <input type="text" name="keyword" value='' class="form-control" placeholder="Find Groups">
         </div>
         <input type="submit" value="Search" class="btn btn-outline-success">
         </form>
  </div>
</div>            
        </div> 
  </div>
</div>


@endsection
