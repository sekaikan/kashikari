<?php
$image = array ('image1.jpg', 'image2.jpg', 'image3.jpg', 'image4.jpg');
$rand = mt_rand(0,3);
?>
 
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

  <title>kashikari</title>
  <style type="text/css">
    body{
      background: linear-gradient(-45deg, rgba(0, 0, 0, .3), rgba(0, 0, 0, .3)), url(images/{{$image[$rand]}});
      background-position: top center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      margin-bottom: 0;
      height:100vh;
    }
    
    /*scroll down button*/
    a#scroll {
      text-decoration: none;
      
    }
    a#scroll span {
      
      position: absolute;
      width: 24px;
      height: 24px;
      border-left: 3px solid #fff;
      border-bottom: 3px solid #fff;
      -webkit-transform: rotate(-45deg);
      transform: rotate(-45deg);
      -webkit-animation: sdb 2s infinite;
      animation: sdb 2s infinite;
      box-sizing: border-box;
    }
    @-webkit-keyframes sdb {
      0% {
        -webkit-transform: rotate(-45deg) translate(0, 0);
      }
      20% {
        -webkit-transform: rotate(-45deg) translate(-10px, 10px);
      }
      40% {
        -webkit-transform: rotate(-45deg) translate(0, 0);
      }
    }
    @keyframes sdb {
      0% {
        transform: rotate(-45deg) translate(0, 0);
      }
      20% {
        transform: rotate(-45deg) translate(-10px, 10px);
      }
      40% {
        transform: rotate(-45deg) translate(0, 0);
      }
    }
    
    .fa-border {
        color: #D6D1CD;
    }
    
    .fa-hand-holding-heart {
        color: #E5399D;
    }
    
    .fa-people-carry{
        color: #3CAFC1;
    }
    
    .fa-comments{
        color: #E2C73F;
    }
    
    .box1 {
    background: #e4fcff;/*背景色*/
    border-top: solid 6px #1dc1d6;
    box-shadow: 0 3px 4px rgba(0, 0, 0, 0.32);/*影*/
    }
    
    .box2 {
    background: #F7E8A0;/*背景色*/
    border-top: solid 6px #F7D736;
    box-shadow: 0 3px 4px rgba(0, 0, 0, 0.32);/*影*/
    }

    
  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-home position-relative">
    <a class="navbar-brand" href="#"><span class="display-4">KASHIKARI</span></a>
            @if (Route::has('login'))
            <ul class="navbar-nav position-absolute">
                @auth 
                    <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
            @endif
    </nav>
    <div class="jumbotron jumbotron-extend">
        <div id="logo">
            <h1 class="display-1 font-weight-bold text-left">KASHIKARI</h1>
            <p class="display-3 font-weight-bold text-left">You can Borrow</p>
            <p class="display-3 font-weight-bold text-left">Almost Everything!</p>
            <p class="lead text-left mt-3">'18 NEW GRADS CODING TRAINING</p>
            <div class="text-center">
                <a href="#top" id="scroll"><span></span></a>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="top">
        <div class="colored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">ABOUT</h2>
                <div class="row">
                    <div class="col-6">
                        <h3 class="display-4 font-weight-bold">KASHIKARI</h3>
                        <p class="my-2">Kasu & Kariru</p>
                        <p>Platform where you can exchange goods.</p>
                        <p>You can also form the community to include user who has a similar taste.</p>
                    </div>
                    <div class="col-6">
                        <img src="/images/borrow.jpg" class="img-thumbnail" alt="borrow">
                        
                    </div>
                </div>
            
        </div>
        <div class="uncolored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">WHAT YOU CAN DO</h2>
                <div class="row">
                    <div class="col-4 text-center">
                        <i class="fas fa-10x fa-hand-holding-heart fa-border"></i> 
                        <p class="font-weight-bold text-center my-3">BORROW</p>
                        <p class="text-center my-3">Post what you need.<br>Find shared items and borrow it!</p>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fas fa-10x fa-people-carry fa-border"></i>
                        <p class="font-weight-bold text-center my-3">LEND</p>
                        <p class="text-center my-3">Post items you don't need.<br>Find people who need something.</p>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fas fa-10x fa-comments fa-border"></i>
                        <p class="font-weight-bold text-center my-3">COMMUNICATE</p>
                        <p class="text-center my-3">Create or join group.<br>Chat each other and users who have a similar taste.</p>
                    </div>
                </div>
        </div>
        <div class="colored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">SHARED ITEMS</h2>
            <div class="row ml-3">
                  <div class="card-deck">
                        <div class="card shadow">
                            <div class="ribbon_box3">
                                <img class="card-img-top" src="/images/vr.jpg" alt="items photo">
                                <div class="ribbon_area">
                                   <span class="ribbon16">Open</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="">
                                    <span class="text-muted">by Takumi</span>
                                </p>
                                <p class="card-text text-justify">You can experience VR!</p>
                                <hr>
                                <p class="card-text"><i class="fas fa-gift text-secondary"></i> $50</p>
                                <button class="borrow btn btn-blue btn-block">Borrow it</button>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="ribbon_box3">
                                <img class="card-img-top" src="/images/dress.jpg" alt="items photo">
                                <div class="ribbon_area">
                                   <span class="ribbon16">Open</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="">
                                    <span class="text-muted">by Beth</span>
                                </p>
                                <p class="card-text text-justify">You can wear it at the formal party.</p>
                                <hr>
                                <p class="card-text"><i class="fas fa-gift text-secondary"></i>$30</p>
                                <button class="borrow btn btn-blue btn-block">Borrow it</button>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="ribbon_box3 filter">
                                <img class="card-img-top close" src="/images/soccerball.jpg" alt="items photo">
                                <div class="ribbon_area">
                                   <span class="ribbon17">closed</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="">
                                    <span class="text-muted">by Manato.F</span>
                                </p>
                                <p class="card-text text-justify">10px with basket</p>
                                <hr>
                                <p class="card-text"><i class="fas fa-gift text-secondary"></i> $5</p>
                                <button class="borrow btn btn-blue btn-block">Borrow it</button>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="ribbon_box3">
                                <img class="card-img-top" src="/images/table.jpg" alt="items photo">
                                <div class="ribbon_area">
                                   <span class="ribbon16">Open</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="">
                                    <span class="text-muted">by Saaya</span>
                                </p>
                                <p class="card-text text-justify">1 table and 2 chairs. You can use it both inside and outside.</p>
                                <hr>
                                <p class="card-text"><i class="fas fa-gift text-secondary"></i> $30</p>
                                <button class="borrow btn btn-blue btn-block">Borrow it</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="uncolored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">VOICE</h2>
                <div class="row my-3">
                    <div class="col-4 box1">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                        <p class="m-3">
                            This is my second rental with Antonio - great equipment, great price and brilliant service!
                        </p>    
                    </div>
                    <div class="col-4 box2">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                        <p class="m-3">
                            Excellent communication, absolutely lovely people, amazing gimbal and an incredibly smooth process!
                        </p>    
                    </div>
                    <div class="col-4 box1">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                        <p class="m-3">
                            Brilliant guy and very easy to deal with. Great kit and really easy to collect and return equipment.
                        </p> 
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-4 box2">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                        <p class="m-3">
                            This is my second rental with Antonio - great equipment, great price and brilliant service!
                        </p>    
                    </div>
                    <div class="col-4 box1">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                        <p class="m-3">
                            This is my second rental with Antonio - great equipment, great price and brilliant service!
                        </p>    
                    </div>
                    <div class="col-4 box2">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                        <p class="m-3">
                            This is my second rental with Antonio - great equipment, great price and brilliant service!
                        </p>    
                    </div>
                </div>
            <p></p>
        <div class="text-center my-5">
            <a class="button1 shadow-lg" href="{{ route('register') }}">Sign Up Now</a>
        </div>
        </div>
        
        
    </div>
    
<footer class="bg-light p-5">
    <div class="text-center text-muted">©2018 KASHIKARI</div>
</footer> 


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


</body>



</html>