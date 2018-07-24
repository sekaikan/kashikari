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
    <div class="mainmenu sen status text-center mt-2">
       <ul class="nav nav-tabs justify-content-center">
          <li class="nav-item col-4 px-0">
            <a class="nav-link" href="/group/{{$group->id}}"><i class="fas fa-home"></i><br>Home</a>
          </li>
          <li class="nav-item col-4 px-0">
            <a href="{{ route('posts.borrow', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-hand-holding-heart"></i><br>Borrow</a>
          </li>
          <li class="nav-item col-4 px-0">
            <a href="{{ route('items.lend', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-people-carry"></i><br>Lend</a>
          </li>
       </ul>
    </div>
</div>
    
    
<div class="container item">
    <div>
        <h2 class="text-center under mx-auto col-8">Shared Items</h2>
         @include('items.items', ['items' => $items])
    </div>
</div>
@endsection