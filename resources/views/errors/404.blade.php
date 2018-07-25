<!DOCTYPE html>
<html>
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
        <div class="container-fluid" style="position: relative;">
            <img src="/images/404.jpg" style="width: 100%; height: 100vh;">
            <div class="row" style="position: absolute; top:40vh; width:100%;">
                <div class="col-8 offset-2 text-center">
                    <p class="text-light display-1" style="font-family: 'Monoton', cursive;">404</p>
                    <div class="my-5">
                        <p class="text-light display-4">Page not found</p>
                        <p class="text-light display-4">You can find more content on <a href="{{'/'}}" style="font-weight: bold; text-decoration: none;">Home</a></p>    
                    </div>
                    
                </div>
            </div>
        </div>    
        
    </body>
</html>
