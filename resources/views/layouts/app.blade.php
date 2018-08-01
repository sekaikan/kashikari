<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kashikari') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
    <!-- Styles -->
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!--google font-->
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">

</head>
<body>
    <div id="busy"></div>
    @include('commons.navbar')

        @yield('cover')

        @include('commons.error_messages')
        @yield('content')

        @include('commons.footer')
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.2.4/dist/ionicons.js"></script>
<script> 
var $form = $("#content-content");
var $ta = $('#form-content');

$(document).on("keypress", "#form-content", function(e) {
  if (e.keyCode == 13) { // Enterが押された
    if (e.shiftKey) { // Shiftキーも押された
      $.noop();
    } else if ($ta.val().replace(/\s/g, "").length > 0) {
      e.preventDefault();
      $form.submit();
    }
  } else {
    $.noop();
  }
});
</script>

<script>
        $(function () {
            $('[data-toggle="popover"]').popover(
                {
                    html: true,
                })
            $('.tutorial').popover('show')
            
            $('.tutorial-close').on('click', function (e) {
                $('.tutorial').popover('hide');
                $('.tutorial-close').hide();
                $('#busy').css('visibility', 'hidden');
            });
        })
        
    </script>
<script src='/js/particle/anime.min.js'></script>
  <script src='/js/particle/particles.js'></script>
  <script src='/js/particle/demo.js'></script>
  <script>
    	document.documentElement.className="js";
    	var supportsCssVars=function(){var e,t=document.createElement("style");return t.innerHTML="root: { --tmp-var: bold; }",document.head.appendChild(t),e=!!(window.CSS&&window.CSS.supports&&window.CSS.supports("font-weight","var(--tmp-var)")),t.parentNode.removeChild(t),e};supportsCssVars()||alert("Please view this demo in a modern browser that supports CSS Variables.");</script>
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
