@extends('layouts.app')

@section('content')
    <div class="jumbotron-home text-center my-5 p-3">
        <div class="row mt-5">
            
            <div class="col-2 offset-5 px-5">
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
    <h1 class='text-center my-5'>Your Item List</h1>
    <div class="container">
        @include('items.items')
        
    </div>

@endsection
