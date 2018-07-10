@extends('layouts.app')

@section('cover')
<div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" style="height:75vh;">
            <div class="carousel-item active">
              <img class="d-block w-100" src="/images/home1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="/images/home2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="/images/home3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
</div>
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 mt-5 mx-auto">
            <a class="btn btn-primary btn-lg btn-block"  href="/group/create">Create Group</a>
        </div> 
    </div>
    
    <div class="mt-4">
    <h3>Group List</h3>
    <div class="row">
        @foreach ($groups as $group)
        <div class="card col-3">
          <div class="card-header">
            {!! $group->name !!}
          </div>
          <img class="card-img-top" src="/images/image1.jpg" alt="Card image cap">
          <div class="card-body">
               {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'delete', 'class'=>'text-right']) !!}
              {!! Form::button('Sign out <ion-icon name="log-out"></ion-icon>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary btn-lg']) !!}
              {!! Form::close() !!}
          </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
