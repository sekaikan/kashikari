@extends('layouts.app')

@section('content')
    <div class="p-5 bg-dark text-center">
        <div class="row mt-5">
            
            <div class="col-2 offset-5 px-5">
                <img src="{{ Gravatar::src($user->email, 300) . '&d=mm' }}" alt="" class="rounded-circle img-fluid" style="border-radius: 20px;"> 
            </div>
            @if(Auth::user()->id == $user->id)
            <div class="col-1 offset-4 text-right">
                <a href="{{ route('users.edit', Auth::user()->id) }}"><i class="far fa-edit text-light"></i></a>
                <a href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt text-light"></i></a>
            </div>
            @endif
        </div>
        <h2 class="font-weight-normal text-light">{{ $user->name }}</h2>
        <p class="lead mt-3 text-light"><i class="fas fa-quote-left text-white-50 mr-3"></i>{{ $user->content }}<i class="fas fa-quote-right text-white-50 ml-3"></i></p>
    </div>
    <h1 class='text-center my-5'>Your Item List</h1>
    <div class="container">
        @include('items.items')
        
    </div>

@endsection
