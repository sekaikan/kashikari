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
  
    <link rel="stylesheet" type="text/css" href="/css/particle/particles.css" />
    <link rel="stylesheet" type="text/css" href="/css/particle/base.css" />
    <script>
    	document.documentElement.className="js";
    	var supportsCssVars=function(){var e,t=document.createElement("style");return t.innerHTML="root: { --tmp-var: bold; }",document.head.appendChild(t),e=!!(window.CSS&&window.CSS.supports&&window.CSS.supports("font-weight","var(--tmp-var)")),t.parentNode.removeChild(t),e};supportsCssVars()||alert("Please view this demo in a modern browser that supports CSS Variables.");</script>
	

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
                                <button class="borrow btn btn-blue btn-block" style="pointer-events: none;">Details</button>
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
                                <button class="borrow btn btn-blue btn-block" style="pointer-events: none;">Details</button>
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
                                <button class="borrow btn btn-blue btn-block" style="pointer-events: none;">Details</button>
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
                                <button class="borrow btn btn-blue btn-block" style="pointer-events: none;">Details</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="colored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">VOICE</h2>
                <div class="row my-3 text-muted">
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
                <div class="row my-3 text-muted">
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
            
                <!--<a href="{{ route('register') }}"></a>-->
                <svg class="hidden">
        			<symbol id="icon-arrow" viewBox="0 0 24 24">
        				<title>arrow</title>
        				<polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
        			</symbol>
        			<symbol id="icon-drop" viewBox="0 0 24 24">
        				<title>drop</title>
        				<path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"/><path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"/>
        			</symbol>
        			<svg id="icon-github" viewBox="0 0 33 33">
        				<title>github</title>
        				<path d="M16.608.455C7.614.455.32 7.748.32 16.745c0 7.197 4.667 13.302 11.14 15.456.815.15 1.112-.353 1.112-.785 0-.386-.014-1.411-.022-2.77-4.531.984-5.487-2.184-5.487-2.184-.741-1.882-1.809-2.383-1.809-2.383-1.479-1.01.112-.99.112-.99 1.635.115 2.495 1.679 2.495 1.679 1.453 2.489 3.813 1.77 4.741 1.353.148-1.052.569-1.77 1.034-2.177-3.617-.411-7.42-1.809-7.42-8.051 0-1.778.635-3.233 1.677-4.371-.168-.412-.727-2.069.16-4.311 0 0 1.367-.438 4.479 1.67a15.602 15.602 0 0 1 4.078-.549 15.62 15.62 0 0 1 4.078.549c3.11-2.108 4.475-1.67 4.475-1.67.889 2.242.33 3.899.163 4.311C26.37 12.66 27 14.115 27 15.893c0 6.258-3.809 7.635-7.437 8.038.584.503 1.105 1.497 1.105 3.017 0 2.177-.02 3.934-.02 4.468 0 .436.294.943 1.12.784 6.468-2.159 11.131-8.26 11.131-15.455 0-8.997-7.294-16.29-16.291-16.29"></path>
        			</svg>
        			<svg id="icon-rewind" viewBox="0 0 36 20">
        				<title>rewind</title>
        				<path d="M16.315.061c.543 0 .984.44.984.984v17.217c0 .543-.44.983-.984.983L.328 10.391s-.738-.738 0-1.476C1.066 8.178 16.315.061 16.315.061zM35.006.061c.543 0 .984.44.984.984v17.217c0 .543-.44.984-.984.984L19.019 10.39s-.738-.738 0-1.475C19.757 8.178 35.006.06 35.006.06z"/>
        			</svg>
        		</svg>
    	
    			<div class="grid__item theme-12">
    				<!--button class="action"><svg class="icon icon--rewind"><use xlink:href="#icon-rewind"></use></svg></button-->
    				<a href="{{ route('register') }}"><button class="particles-button">Sign Up Now</button></a>
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
            
<footer class="bg-light p-5">
    <div class="text-center text-muted">©2018 KASHIKARI '18 NEW GRADS CODING TRAINING</div>
</footer> 


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src='/js/particle/anime.min.js'></script>
  <script src='/js/particle/particles.js'></script>
  <script src='/js/particle/demo.js'></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script>
    $(function() {
      //'#'から始まるhrefを持つaタグ、target属性を持つaタグを除く
      $('a:not([href^="#"]):not([target])').on('click', function(e){
        //クリック時の挙動を停止
        e.preventDefault(); 
        //href属性の属性情報を取得
        url = $(this).attr('href');
        if (url !== '') {
          //bodyタグへ任意のクラスを追加
          $('body').addClass('class_name');
          //setTimeOutを用いて500s後にurl遷移を実行
          setTimeout(function(){
            window.location = url;
          }, 550);
        }
        return false;
      });
    });
  </script>

</body>



</html>