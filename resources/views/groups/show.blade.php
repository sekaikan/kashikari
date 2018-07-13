@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    
    <div class="col-4">
     <?php $image_rand = array(
                            "images/image1.jpg",
                            "images/image2.jpg",
                            "images/image3.jpg", 
                            "images/home1.jpg", 
                          );
             
                        $image_rand = $image_rand[mt_rand(0, count($image_rand)-1)];
                      ?>

                       <img  class="rounded" src="{{ $image_rand }}">
     </div>
     
     <div class="col-8">
      <h1 class="text-center text-yellow">{!! $group->name !!}</h1>
        @include('group_user.follow_button', ['user' => $user])
         
         
     </div>
  <div class="col-12">
  <div class="card" style="width: 18rem;">
   <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text"></p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
 </div>
         
         
         
         
         
         
  </div>
     
     
     </div>
</div>
@endsection