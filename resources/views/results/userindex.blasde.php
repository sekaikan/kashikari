@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row pt-5">
    </div>
    <h1>{{$users->count()}}
        @if($users->count() == 1)
            user 
        @else
            users 
        @endif
        found for "{{$keyword}}".</h1>
    <div class="row">
            @include('users.users')
    </div>
</div>
@endsection