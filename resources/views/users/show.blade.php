@extends('layouts.app')

@section('content')
    <div class="jumbotron-home text-center my-5 p-3">
        <div class="row mt-5">
            
            <div class="col-2 offset-5 px-0">
                <img class="usershowicon" src="{{ $user->photo }}"> 
            </div>
        </div>
        <h2 class="font-weight-normal text-light">{{ $user->name }}</h2>
        <p class="lead mt-3 text-light"><i class="fas fa-quote-left text-white-50 mr-3"></i>{{ $user->content }}<i class="fas fa-quote-right text-white-50 ml-3"></i></p>
        @if(Auth::user()->id == $user->id)
            <div class="offset-9">
                <a href="{{ route('users.edit', Auth::user()->id) }}" class="mr-3 text-muted"><i class="far fa-edit text-muted"></i>Profile Setting</a>
                <a href="{{ route('logout') }}"onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="text-muted"><i class="fas fa-sign-out-alt text-muted"></i>Logout</a>
            </div>
        @endif
    </div>
    
    <div class="container pt-3 bg-light">

         <div class="row">
              <div class="col-8">
                    <h1 class='text-center under'>Your Items</h1>
                    <div class="my-3">
                    @if($items->count() == 0)
                      <h4 class= "text-muted text-center mt-4">No Items</h4>
                    @else
                        @include('items.items', ['items' => $items])
                    @endif
                    </div>
              </div>
              <div class="col-4">
                   <h1 class="under text-center">Your Groups</h1>
                   <div class="my-3">
                    @if($follow_groups->count()==0 )
                            <h4 class="text-muted text-center mt-4">No Groups</h4>
                    @else
                        @foreach($follow_groups as $group)
                               <h5 class="ml-5 text-center"><a href="{{ route('group.show', $group->id) }}" class="">{{ $group->name }}</a></h5>
                            @endforeach
                    @endif
                    </div>
              </div>
        </div>

    </div>

@endsection

        
