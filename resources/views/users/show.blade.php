@extends('layouts.app')

@section('content')
    <div class="p-5 bg-dark text-center">
        <div class="mt-5 mb-3">
            <img src="/images/user{{$user->id}}.jpg" alt="" class="rounded-circle user-photo">
        </div>
        <h2 class="font-weight-normal text-light">{{ $user->name }}</h2>
        <p class="lead mt-3 text-light"><i class="fas fa-quote-left text-white-50 mr-3"></i>{{ $user->content }}<i class="fas fa-quote-right text-white-50 ml-3"></i></p>
    </div>
    <div class="container">
        {{ $user->password }}
    @if(Auth::user()->id == $user->id)
        <a href="{{ route('users.edit', Auth::user()->id) }}">プロフィール設定</a>
    @endif
    </div>

@endsection
