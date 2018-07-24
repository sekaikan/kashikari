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
    #scroll {
      text-decoration: none;
      
    }
    #scroll span {
      
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
    
    .fa-comments.test{
        color: #E2C73F;
    }
    
    .box1 {
    background: #fcca7e;/*背景色*/
    border-top: solid 6px #F99F48;
    box-shadow: 0 3px 4px rgba(0, 0, 0, 0.32);/*影*/
    }
    
    .box2 {
    background: #AEC4E5;/*背景色*/
    border-top: solid 6px #1dc1d6;
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">SignUp</a></li>
                @endauth
            </ul>
            @endif
    </nav>
    <div class="jumbotron jumbotron-extend">
        <div id="logo">
            <p class="display-3 font-weight-bold text-left">Share your items,</p>
            <p class="display-3 font-weight-bold text-left">Share your happiness.</p>
            <div class="text-left mt-5 mb-3">
                <a class="button1 shadow-lg" href="{{ route('register') }}">Try it free! *</a>
            </div>
            <p class="small text-light">* Subscribers can try it free for one month. Plan automatically renews after trial.</p>
            <div class="text-center">

             

                <div id="scroll"><span></span></div>

            </div>
        </div>
    </div>
    <div class="container-fluid" id="top">
        <div class="uncolored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">ABOUT</h2>
                <div class="row">
                    <div class="col-6">
                        <h3 class="display-4 font-weight-bold">KASHIKARI</h3>
                        <p class="font-weight-bold text-muted my-3">Platform where you can exchange goods.</p>
                        <p class="font-weight-bold text-muted my-3">You can also form the community to include user who has a similar taste.</p>
                    </div>
                    <div class="col-6">
                        <img src="/images/borrow.jpg" class="img-thumbnail" alt="borrow">
                        
                    </div>
                </div>
            
        </div>
        <div class="colored content p-5">
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
                        <i class="fas fa-10x fa-comments test fa-border"></i>
                        <p class="font-weight-bold text-center my-3">COMMUNICATE</p>
                        <p class="text-center my-3">Create or join group.<br>Chat each other and users who have a similar taste.</p>
                    </div>
                </div>
        </div>
        <div class="uncolored content p-5">
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
                                <button class="borrow btn btn-blue btn-block" style="pointer-events: none;">Borrow it</button>
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
                                <button class="borrow btn btn-blue btn-block" style="pointer-events: none;">Borrow it</button>
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
                                <button class="borrow btn btn-blue btn-block" style="pointer-events: none;">Borrow it</button>
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
                                <button class="borrow btn btn-blue btn-block" style="pointer-events: none;">Borrow it</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="colored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">VOICE</h2>
                <div class="row my-3">
                    <div class="col-4 box1">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                        <p class="m-3">
                            I borrowed laptop on KASHIKARI for the first time. They have a variety of products to borrow and users are very kind.
                        </p>    
                    </div>
                    <div class="col-4 box2">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>ERIKA</h3>
                        <p class="m-3">
                            This page is wonderful! I could find easily what I want to need and communicate with users.
                        </p>    
                    </div>
                    <div class="col-4 box1">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>TAKUMI</h3>
                        <p class="m-3">
                            This is my second rental on KASHIKARI - great equipment, great price and brilliant service!
                        </p> 
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-4 box2">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>MANATEE</h3>
                        <p class="m-3">
                            Excellent communication, absolutely lovely users, amazing gimbal and an incredibly smooth process!
                        </p>    
                    </div>
                    <div class="col-4 box1">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>SAAYA</h3>
                        <p class="m-3">
                            It is easy to find what I want to borrow. I will use KASHIKARI for next time!!
                        </p>    
                    </div>
                    <div class="col-4 box2">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>MAHO</h3>
                        <p class="m-3">
                            I borrowed coffee machine in coffee lovers group! I can not only borrow goods but also meet great people.
                        </p>    
                    </div>
                </div>
        </div>
        <div class="uncolored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">HOW TO START</h2>
            <div class="row text-center">
                <div class="col-7">
                    <img src="images/capture.jpg" class="mx-auto rounded">
                </div>
                <diV class="col-5 my-auto">
                    <p class="font-weight-bold text-muted my-3">You can try KASHIKARI free for one month.</p> 
                    <p class="font-weight-bold text-muted my-3">Plan automatically renews after trial.</p>
                    <p class="font-weight-bold text-muted my-3">Share you items, borrow anything, and communicate with you group members.</p>
                </div>
            </div>
            <div class="text-center my-5">
                <a class="button1 shadow-lg" href="{{ route('register') }}">Sign Up Now</a>
            </div>
        </div>
        <div class="colored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">LICENSE</h2>
            <div class="row my-3">
                <div class="col-10 offset-1">
                    <p>Kashikari is developed with...</p>
                    <ul>
                        <li><a href="///laravel.com">Laravel</a></li>
                        <li><a href="///getbootstrap.com">Bootstrap</a></li>
                        <li><a href="///unsplash.com">Unsplash</a></li>
                    </ul>
                </div>
            </div>
        </div>
            
    
        </div>
        
        
    </div>
    
<footer class="bg-light p-5">
    <div class="text-center text-muted">©2018 KASHIKARI '18 NEW GRADS CODING TRAINING</div>
</footer> 


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


</body>



</html>