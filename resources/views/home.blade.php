@extends('layouts.app')

@section('cover')
<div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" style="height:70vh;">
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
        <div class="col-8 mt-5">
            <a class="btn btn-primary btn-lg btn-block"  href="/group/create">グループを作る</a>
        </div> 
        <div class="card col-4 mt-5">
          <div class="card-header">
            Group List
          </div>
          
            <ul class="list-group list-group-flush">
            @foreach ($groups as $group)
            <li class="list-group-item">
              <a href="/group">
                  {!! $group->name !!}
              </a>
              {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'delete', 'class'=>'text-right']) !!}
              {!! Form::button('<ion-icon name="log-out"></ion-icon>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary btn-lg']) !!}
              {!! Form::close() !!}
            </li>
            @endforeach
            </ul>
            
        </div>
    </div>
    <h3>グループ　ランキング</h3>
    <div class="row">
        <div class="card col-3">
          <div class="card-header">
          </div>
          <img class="card-img-top" src="/images/img.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">18th New Grads</p>
          </div>
        </div>
        <div class="card col-3">
          <div class="card-header">
            ２位
          </div>
          <img class="card-img-top" src="/images/img.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Sekaikan</p>
          </div>
        </div>
        <div class="card col-3">
          <div class="card-header">
            3rd
          </div>
          <img class="card-img-top" src="/images/img.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Eco/Cafeteria comittee</p>
          </div>
        </div>
        <div class="card col-3">
          <div class="card-header">
            ４位
          </div>
          <img class="card-img-top" src="/images/img.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Attendance comittee</p>
          </div>
        </div>
     </div>
</div>

@endsection
