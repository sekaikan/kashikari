@extends('layouts.app')

@section('cover')
    <div class="jumbotron jumbotron-home">
            <h1 class="text-center text-white mt-5">{!! $group->name !!}</h1>
            
            <div class="col-3 mx-auto">
                <div class="mx-auto">
                    @if (isset($groupusers))
                        @foreach($groupusers as $key => $groupuser)
                        <img class="usericon" src="{{ $groupuser->photo }}">
                        @endforeach
                    @endif
                    <a href="{{route('group.userlist', ['id' => $group->id]) }}" class="lasticon"><i class="fas fa-ellipsis-h text-light"></i></a> 
                </div>
            </div>
            
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="mainmenu sen status text-center">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item active col-4 px-0">
                <a class="nav-link" href="/group/{{$group->id}}"><i class="fas fa-home"></i><br>Home</a>
                </li>
    
                <li class="nav-item sample col-4 px-0">
                <a href="{{ route('posts.borrow', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-hand-holding-heart"></i><br>Borrow
                <div class="box">
		<p class="text">you can request items!</p>
	</div></a>
                </li>
    
                <li class="nav-item sample col-4 px-0">
                <a href="{{ route('items.lend', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-people-carry"></i><br>Lend
                <div class="box">
		<p class="text">you can lend items!</p>
	</div></a>
                </li>
            </ul>
        </div>


    <div class="container pt-5 bg-light">
        <div class="row">
            <div class="col-8 pl-5">
                <h2 class="text-center text-muted">Shared Items</h2>
                @include('items.items', ['items' => $items])
                @if (count($items) >0)
                    <a href="{{ route ('items.index', ['id' => $group->id]) }}" class="offset-5"><i class="fas fa-2x fa-fw fa-chevron-circle-down my-3"></i><span class="h6">Item List</span></a>
                @endif
            </div>
            <div class="col-4">
                <h2 class="text-center text-muted">Posted Messages</h2>
                @include('posts.posts', ['posts' => $posts])
                @if (count($posts) >0)

                    <a href="{{ route ('posts.index', ['id' => $group->id]) }}" class="float-right"><i class="fas fa-2x fa-fw fa-chevron-circle-down my-3"></i><span class="h6">More...</span></a>

                @endif
            </div>
        </div>
        
    </div>

@endsection