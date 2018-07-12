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

  <title>Hello, world!</title>
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
  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-home ml-5 position-relative">
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
            <h1 class="font-weight-bold text-left">KASHIKARI</h1>
            <p class="lead text-left mt-3">'18 NEW GRADS CODING TRAINING</p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="colored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">What you can do</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip
                ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril
                delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui
                facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc
                putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
            </p>
        </div>
        <div class="uncolored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">How to use</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus
                legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera
                gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
        </div>
        <div class="colored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">Recently viewed items</h2>
            <div class="row ml-3">
                <div class="col-3">
                    <div class="card shadow">
                        <img class="card-img-top" src="/images/vr.jpg" alt="items photo">
                        <div class="card-body">
                            <h5 class="card-title">VR
                                <span class="badge badge-pill badge-success">Open</span>
                            </h5>
                            <p class="">
                                <span class="text-muted">by Takumi</span>
                            </p>
                            <p class="card-text text-justify">You can experience VR!</p>
                            <hr>
                            <p class="card-text"><i class="fas fa-gift text-secondary"></i> $50</p>
                            <button class="borrow btn btn-primary btn-block">Borrow it</button>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card shadow">
                        <img class="card-img-top" src="/images/dress.jpg" alt="items photo">
                        <div class="card-body">
                            <h5 class="card-title">Dress
                                <span class="badge badge-pill badge-success">Open</span>
                            </h5>
                            <p class="">
                                <span class="text-muted">by Beth</span>
                            </p>
                            <p class="card-text text-justify">You can wear it at the formal party.</p>
                            <hr>
                            <p class="card-text"><i class="fas fa-gift text-secondary"></i>$30</p>
                            <button class="borrow btn btn-primary btn-block">Borrow it</button>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card shadow">
                        <img class="card-img-top" src="/images/soccerball.jpg" alt="items photo">
                        <div class="card-body">
                            <h5 class="card-title">Soccer Ball
                                <span class="badge badge-pill badge-success">Open</span>
                            </h5>
                            <p class="">
                                <span class="text-muted">by Manato.F</span>
                            </p>
                            <p class="card-text text-justify">10px with basket</p>
                            <hr>
                            <p class="card-text"><i class="fas fa-gift text-secondary"></i> $5</p>
                            <button class="borrow btn btn-primary btn-block">Borrow it</button>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card shadow">
                        <img class="card-img-top" src="/images/table.jpg" alt="items photo">
                        <div class="card-body">
                            <h5 class="card-title">Dining Table
                                <span class="badge badge-pill badge-danger">Booked</span>
                            </h5>
                            <p class="">
                                <span class="text-muted">by Saaya</span>
                            </p>
                            <p class="card-text text-justify">1 table and 2 chairs. You can use it both inside and outside.</p>
                            <hr>
                            <p class="card-text"><i class="fas fa-gift text-secondary"></i> $30</p>
                            <button class="borrow btn btn-primary btn-block">Borrow it</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uncolored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">Voice</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip
                ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril
                delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit
                eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum
                claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
        <div class="text-center my-5">
            <a class="button1" href="{{ route('register') }}">Sign Up Now</a>
        </div>
        </div>
        
        
    </div>
    

              
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

<footer>
    <div class="text-center text-muted">©2018 KASHIKARI</div>
</footer>

</html>