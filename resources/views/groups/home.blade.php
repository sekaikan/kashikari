@extends('layouts.app')

@section('cover')
    <?php 
        $datetime1 = new DateTime(\Auth::user()->created_at);
        $datetime1 = $datetime1->getTimestamp();
        $datetime2 = new DateTime(date('Y-m-d H:i:s'));
        $datetime2 = $datetime2->getTimestamp();
        $interval = $datetime2 - $datetime1;
        $is_new = $interval < 40;
    ?>
    @if($is_new)
    <style type="text/css">
        #busy {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0px;
            top:0px;
            background-color: black;
            opacity: 0.5;
            visibility: visible;
            z-index: 1040;
        }
    </style>
    @endif
    <div class="jumbotron jumbotron-home">
            <h1 class="text-center text-white mt-5">{!! $group->name !!}</h1>
            
            <div class="col-3 mx-auto">
                <div class="mx-auto">
                    @if (isset($groupusers))
                        @foreach($groupusers as $key => $groupuser)
                        <img class="usericon" src="{{ $groupuser->photo }}">
                        @endforeach
                    @endif
                    @if($is_new)
                    <a href="{{route('group.userlist', ['id' => $group->id]) }}" class="lasticon tutorial"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="<strong>You can see the group information and group chat!</strong>"><i class="fas fa-ellipsis-h text-light"></i></a> 
                    @else
                    <a href="{{route('group.userlist', ['id' => $group->id]) }}" class="lasticon"><i class="fas fa-ellipsis-h text-light"></i></a> 
                    @endif
                </div>
            </div>
            
    </div>
@endsection

@section('content')
    @if($is_new)
    <div class="fixed-bottom text-right m-5" style="z-index: 1050;">
        <a class="btn btn-orange btn-lg tutorial-close text-light shadow-lg"><i class="fas fa-times mr-2"></i>End Tutorial</a></span>
    </div>
    @endif
    <div class="container">
        <div class="mainmenu sen status text-center">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item active col-4 px-0">
                    <a class="nav-link" href="/group/{{$group->id}}"><i class="fas fa-home"></i><br>Home
                    </a>
                </li>
                @if($is_new)
                <li class="nav-item sample col-4 px-0 tutorial"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="<strong>Tell your friends what you need.</strong>">
                @else
                <li class="nav-item sample col-4 px-0">
                @endif
                    <a href="{{ route('posts.borrow', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-hand-holding-heart"></i><br>Borrow
                        <div class="box">
                            <p class="text">Tell your friends what you need.</p>
                        </div>
                    </a>
                </li>
                @if($is_new)
                <li class="nav-item sample col-4 px-0 tutorial"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="<strong>Register your items to lend.</strong>">
                @else
                <li class="nav-item sample col-4 px-0">
                @endif
                    <a href="{{ route('items.lend', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-people-carry"></i><br>Lend
                        <div class="box">
                            <p class="text">Register your items to lend.</p>
                        </div>
                    </a>
                </li>
           </ul>
        </div>
    <div class="container pt-5 bg-light">
        <div class="row">
            <div class="col-7 pl-4">
                
                <h2 class="text-center text-muted under">Shared Items</h2>
                @if(count($items) == 0)
                <a href="{{ route('items.lend', ['id' => $group->id]) }}"><p class="text-center"><i class="fas fa-plus fa-4x text-muted my-5"></i></p></a>
                @else
                 @include('items.items', ['items' => $items])
                @endif
                
                @if (count($items) >0)
                    <a href="{{ route ('items.index', ['id' => $group->id]) }}" class="offset-5"><i class="fas fa-2x fa-fw fa-chevron-circle-down my-3"></i><span class="h6">More...</span></a>
                @endif
            </div>
            <div class="col-5">
                <h2 class="text-center text-muted under">Posted Messages</h2>
                @if(count($posts) == 0)
                <a href="{{ route('posts.borrow', ['id' => $group->id]) }}" ><p class="text-center"><i class="fas fa-plus fa-4x text-muted my-5"></i></p></a>
                @else
              
                @include('posts.posts', ['posts' => $posts])
                @endif
                
                @if (count($posts) >0)
                    <a href="{{ route ('posts.index', ['id' => $group->id]) }}" class="float-right"><i class="fas fa-2x fa-fw fa-chevron-circle-down my-3"></i><span class="h6">More...</span></a>

                @endif
            </div>
        </div>
        
    </div>

@endsection