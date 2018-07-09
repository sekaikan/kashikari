@extends('layouts.app')
{{--
@section('cover')
<div class="container-fluid">
    <div class="cover">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
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
</div>
@endsection
--}}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <button type="button" class="btn btn-primary btn-lg btn-block">グループを作る</button>
        </div>
        <div class="col-4">
            <button type="button" class="btn btn-primary btn-lg btn-block">グループを探す</button>
        </div>
        <div class="card col-4">
          <div class="card-header">
            Group List
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="/group" >18th New Grads</a></li>
            <li class="list-group-item">Sekaikan</li>
            <li class="list-group-item">6A</li>
            <li class="list-group-item">8A</li>
            <li class="list-group-item">Eco/Cafeteria comittee</li>
            <li class="list-group-item">Attendance comittee</li>
          </ul>
        </div>
    </div>
    <h3>グループ　ランキング</h3>
    <div class="row">
        <div class="card col-3">
          <div class="card-header">
            １位
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
