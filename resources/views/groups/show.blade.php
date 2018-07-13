@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row">
    
    <div class="col-4 mt-5">
     <?php $image_rand = array(
                            "images/image1.jpg",
                            "images/image2.jpg",
                            "images/image3.jpg", 
                            "images/home1.jpg", 
                          );
             
                        $image_rand = $image_rand[mt_rand(0, count($image_rand)-1)];
                      ?>

          <img  class="img-fluid" alt="Responsive image" src="{{ secure_asset($image_rand) }}">
     </div>
     

     <div class="col-8 mt-5">
      <h1 class="text-center text-black mt-2">{!! $group->name !!}</h1>
      <div class="float-right">

        @include('group_user.follow_button', ['user' => $user])
      </div>   
         
     </div>
  <div class="col-12 mt-4">
  <div class="card" style="width: 100%;">
   <div class="card-body">

    <h4 class="card-title">Members</h4>
    @if (count($group) > 0)
      <p class="card-text">{{ $group->name }}</p>
    @endif

    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
 </div>
         
         
         
         
         
         
  </div>
     
     
     </div>
</div>
@endsection